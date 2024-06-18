<?php
namespace App\Helpers;

use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;
use App\Models\UserLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserLogHelper
{
    public static function userLog(Request $request, $group='home'){
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
                'group_page' => $group,
                'url' => $url,
                'access_date' => $today,
            ]);
        }
    }
}
