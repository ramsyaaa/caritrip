<?php

namespace App\Http\Controllers\Traveller;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Http\Controllers\Controller;
use App\Models\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function index(Request $request){
        UserLogHelper::userLog($request, 'boat');
        $data = TripHelper::getNavbarTripsData();

        $boatTravelPackageIds = [];
        $data['category'] = null;

        $data['boats'] = Boat::get();

        return view('traveller.id.boats.boats', $data);
    }
}
