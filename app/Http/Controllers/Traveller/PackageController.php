<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\BoatTravelTrip;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show($id){
        $data['package'] = BoatTravelTrip::findOrFail($id);

        return view('traveller.id.packages.detail', $data);
    }
}
