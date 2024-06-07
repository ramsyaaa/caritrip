<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\BoatTravelPackage;
use App\Models\BoatTravelTrip;
use App\Models\FullDayCruise;
use App\Models\OpenTrip;
use App\Models\PrivateTrip;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;
use App\Models\UserLog;
use Carbon\Carbon;

class PackageController extends Controller
{
    public function index(Request $request){
        $boatTravelPackageIds = [];
        $data['category'] = null;
        $openTripBoatTravelPackageIds = OpenTrip::distinct()
            ->pluck('boat_travel_package_id');
        $privateBoatTravelPackageIds = PrivateTrip::distinct()
            ->pluck('boat_travel_package_id');
        $FullDayCruiseBoatTravelPackageIds = FullDayCruise::distinct()
            ->pluck('boat_travel_package_id');

        $data['navbarOpenTrips'] = BoatTravelPackage::whereIn('id', $openTripBoatTravelPackageIds)->get();
        $data['navbarPrivateTrips'] = BoatTravelPackage::whereIn('id', $privateBoatTravelPackageIds)->get();
        $data['navbarFullDayCruises'] = BoatTravelPackage::whereIn('id', $FullDayCruiseBoatTravelPackageIds)->get();
        if ($request->has('category')) {
            $data['category'] = $request->input('category');
            if($data['category'] == 'Open Trip'){
                $boatTravelPackageIds = OpenTrip::distinct()
                    ->pluck('boat_travel_package_id');
            }elseif($data['category'] == 'Private Trip'){
                $boatTravelPackageIds = PrivateTrip::distinct()
                    ->pluck('boat_travel_package_id');
            }elseif($data['category'] == 'Full Day Cruise'){
                $boatTravelPackageIds = FullDayCruise::distinct()
                    ->pluck('boat_travel_package_id');
            }

            if(count($boatTravelPackageIds) > 0){
                $data['trips'] = BoatTravelPackage::whereIn('id', $boatTravelPackageIds)->get();
            }else{
                $data['trips'] = [];
            }
        }
        else{
            $data['trips'] = BoatTravelPackage::get();
        }

        // Mendapatkan IP pengguna
        $ip = $request->ip();

        // Mendapatkan data lokasi berdasarkan IP
        $response = Http::get("http://ipinfo.io/{$ip}/json");
        $location = $response->json();

        // Mendapatkan informasi browser pengguna
        $agent = new Agent();
        $browser = $agent->browser();

        // Mendapatkan URL yang diakses
        $url = $request->url();

        // Mendapatkan tanggal hari ini
        $today = Carbon::today()->toDateString();

        // Mengecek apakah sudah ada entri untuk IP, URL, dan tanggal hari ini
        $existingLog = UserLog::where('ip_address', $ip)
            ->where('url', $url)
            ->where('browser', $browser)
            ->whereDate('access_date', $today)
            ->first();

        // Jika belum ada, simpan data baru
        if ($existingLog == null) {
            UserLog::create([
                'ip_address' => $ip,
                'country' => $location['country'] ?? 'Unknown',
                'browser' => $browser,
                'group_page' => "package",
                'url' => $url,
                'access_date' => $today,
            ]);
        }
        return view('traveller.id.packages.packages', $data);
    }
    public function show(Request $request, $id){
        $data['package'] = BoatTravelPackage::findOrFail($id);
        $data['category'] = "";
        if ($request->has('category')) {
            $data['category'] = $request->input('category');
        }

        $openTripBoatTravelPackageIds = OpenTrip::distinct()
            ->pluck('boat_travel_package_id');
        $privateBoatTravelPackageIds = PrivateTrip::distinct()
            ->pluck('boat_travel_package_id');
        $FullDayCruiseBoatTravelPackageIds = FullDayCruise::distinct()
            ->pluck('boat_travel_package_id');

        $data['navbarOpenTrips'] = BoatTravelPackage::whereIn('id', $openTripBoatTravelPackageIds)->get();
        $data['navbarPrivateTrips'] = BoatTravelPackage::whereIn('id', $privateBoatTravelPackageIds)->get();
        $data['navbarFullDayCruises'] = BoatTravelPackage::whereIn('id', $FullDayCruiseBoatTravelPackageIds)->get();

        // Mendapatkan IP pengguna
        $ip = $request->ip();

        // Mendapatkan data lokasi berdasarkan IP
        $response = Http::get("http://ipinfo.io/{$ip}/json");
        $location = $response->json();

        // Mendapatkan informasi browser pengguna
        $agent = new Agent();
        $browser = $agent->browser();

        // Mendapatkan URL yang diakses
        $url = $request->url();

        // Mendapatkan tanggal hari ini
        $today = Carbon::today()->toDateString();

        // Mengecek apakah sudah ada entri untuk IP, URL, dan tanggal hari ini
        $existingLog = UserLog::where('ip_address', $ip)
            ->where('url', $url)
            ->where('browser', $browser)
            ->whereDate('access_date', $today)
            ->first();

        // Jika belum ada, simpan data baru
        if ($existingLog == null) {
            UserLog::create([
                'ip_address' => $ip,
                'country' => $location['country'] ?? 'Unknown',
                'browser' => $browser,
                'group_page' => "package",
                'url' => $url,
                'access_date' => $today,
            ]);
        }
        return view('traveller.id.packages.detail', $data);
    }
}
