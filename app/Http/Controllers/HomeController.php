<?php

namespace App\Http\Controllers;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Models\Blog;
use App\Models\BoatTravelPackage;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        UserLogHelper::userLog($request, 'home');
        $data = TripHelper::getNavbarTripsData();

        $data['packages'] = BoatTravelPackage::get();
        $data['travels'] = TravelPackage::get();
        $data['blogs'] = Blog::limit(9)->get();

        return view('traveller.id.home', $data);
    }
}
