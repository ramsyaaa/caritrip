<?php

namespace App\Http\Controllers\Traveller;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Http\Controllers\Controller;
use App\Models\BoatTravelPackage;
use App\Models\FullDayCruise;
use App\Models\OpenTrip;
use App\Models\PrivateTrip;
use App\Models\TravelOpenTrip;
use App\Models\TravelPackage;
use App\Models\TravelPrivateTrip;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request){
        UserLogHelper::userLog($request, 'package');
        $data = TripHelper::getNavbarTripsData();

        $boatTravelPackageIds = [];
        $data['category'] = null;
        $data['type'] = null;

        // Check for the category in the request
        if ($request->has('category')) {
            $data['category'] = $request->input('category');

            if($data['category'] == 'Open Trip') {
                $boatTravelPackageIds = OpenTrip::distinct()
                    ->pluck('boat_travel_package_id');
                $travelPackageIds = TravelOpenTrip::distinct()
                    ->pluck('travel_package_id');
            } elseif($data['category'] == 'Private Trip') {
                $boatTravelPackageIds = PrivateTrip::distinct()
                    ->pluck('boat_travel_package_id');
                $travelPackageIds = TravelPrivateTrip::distinct()
                    ->pluck('travel_package_id');
            } elseif($data['category'] == 'Full Day Cruise') {
                $boatTravelPackageIds = FullDayCruise::distinct()
                    ->pluck('boat_travel_package_id');
            }
        }

        // Initialize empty arrays if they are not set
        $boatTravelPackageIds = $boatTravelPackageIds ?? [];
        $travelPackageIds = $travelPackageIds ?? [];

        // Check for the type in the request
        if ($request->has('type')) {
            $data['type'] = $request->input('type');

            // Filter trips based on the type
            if ($data['type'] == 'Boat Trip') {
                if(count($boatTravelPackageIds) > 0) {
                    $data['trips'] = BoatTravelPackage::whereIn('id', $boatTravelPackageIds)->get();
                } else {
                    $data['trips'] = BoatTravelPackage::get();
                }
                // Set travels to an empty collection as type is boat trip
                $data['travels'] = collect();
            } elseif ($data['type'] == 'Travel Trip') {
                if(count($travelPackageIds) > 0) {
                    $data['travels'] = TravelPackage::whereIn('id', $travelPackageIds)->get();
                } else {
                    $data['travels'] = TravelPackage::get();
                }
                // Set trips to an empty collection as type is travel trip
                $data['trips'] = collect();
            } else {
                // If type is not specified or invalid, set both
                if(count($boatTravelPackageIds) > 0) {
                    $data['trips'] = BoatTravelPackage::whereIn('id', $boatTravelPackageIds)->get();
                } else {
                    $data['trips'] = BoatTravelPackage::get();
                }
                if(count($travelPackageIds) > 0) {
                    $data['travels'] = TravelPackage::whereIn('id', $travelPackageIds)->get();
                } else {
                    $data['travels'] = TravelPackage::get();
                }
            }
        } else {
            // If type is not specified, set both trips and travels
            if(count($boatTravelPackageIds) > 0) {
                $data['trips'] = BoatTravelPackage::whereIn('id', $boatTravelPackageIds)->get();
            } else {
                $data['trips'] = BoatTravelPackage::get();
            }
            if(count($travelPackageIds) > 0) {
                $data['travels'] = TravelPackage::whereIn('id', $travelPackageIds)->get();
            } else {
                $data['travels'] = TravelPackage::get();
            }
        }

        return view('traveller.id.packages.packages', $data);
    }
    public function show(Request $request, $id){
        UserLogHelper::userLog($request, 'package');
        $data = TripHelper::getNavbarTripsData();

        // $data['package'] = BoatTravelPackage::findOrFail($id);
        $data['category'] = "";
        if ($request->has('category')) {
            $data['category'] = $request->input('category');
        }
        if ($request->has('type')) {
            $data['type'] = $request->input('type');
            if($data['type'] == 'Boat Trip'){
                $data['package'] = BoatTravelPackage::findOrFail($id);
            }
            elseif($data['type'] == 'Travel Trip'){
                $data['package'] = TravelPackage::findOrFail($id);
            }
        }else{
            return abort(404);
        }

        return view('traveller.id.packages.detail', $data);
    }
}
