<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Alert;
use App\Models\UserLog;
use Carbon\Carbon;
use DateTime;
use DB;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $data['total_users'] = UserLog::select('ip_address')
        ->distinct()
        ->count('ip_address');
        // Ambil tanggal hari ini
        $today = Carbon::today();

        // Buat array untuk menyimpan data
        $lastUsers = [];

        // Loop untuk 7 hari terakhir
        for ($i = 0; $i < 7; $i++) {
            // Tanggal yang diinginkan
            $date = $today->copy()->subDays($i);
            // Format tanggal sesuai kebutuhan (misal: 'Y-m-d')
            $formattedDate = $date->format('Y-m-d');

            // Tambahkan data ke array dengan default 0
            $datetime = new DateTime($formattedDate);
            $dayName = $datetime->format('l');
            $lastUsers[$dayName] = 0;
        }

        // Ambil data dari database
        $logs = UserLog::select(DB::raw('DATE(created_at) as date'), DB::raw('count(distinct ip_address) as total'))
            ->where('created_at', '>=', $today->copy()->subDays(6)) // 7 hari terakhir termasuk hari ini
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Isi data yang ada dalam query
        foreach ($logs as $log) {
            $datetime = new DateTime($log->date);
            $dayName = $datetime->format('l');
            $lastUsers[$dayName] = $log->total;
        }
        $data['last_users'] = array_reverse($lastUsers, true);

        // dd($lastUsers);
        return view('admin.dashboard', $data);
    }

}
