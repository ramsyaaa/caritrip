<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;
use App\Models\UserLog;
use Carbon\Carbon;

class UserInformation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
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
            ->whereDate('access_date', $today)
            ->first();

        // Jika belum ada, simpan data baru
        // if (!$existingLog) {
        //     UserLog::create([
        //         'ip_address' => $ip,
        //         'country' => $location['country'] ?? 'Unknown',
        //         'browser' => $browser,
        //         'url' => $url,
        //         'access_date' => $today,
        //     ]);
        // }

        return $next($request);
    }
}
