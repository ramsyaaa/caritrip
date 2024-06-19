<?php

namespace App\Http\Controllers\Traveller;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(Request $request){
        UserLogHelper::userLog($request, 'about');
        $data = TripHelper::getNavbarTripsData();

        return view('traveller.id.about', $data);
    }
}
