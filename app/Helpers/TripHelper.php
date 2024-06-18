<?php
namespace App\Helpers;

use App\Models\BoatTravelPackage;
use App\Models\FullDayCruise;
use App\Models\OpenTrip;
use App\Models\PrivateTrip;
use App\Models\TravelOpenTrip;
use App\Models\TravelPackage;
use App\Models\TravelPrivateTrip;

class TripHelper
{
    public static function getNavbarTripsData()
    {
        $openTripBoatTravelPackageIds = OpenTrip::distinct()
            ->pluck('boat_travel_package_id');
        $privateBoatTravelPackageIds = PrivateTrip::distinct()
            ->pluck('boat_travel_package_id');
        $FullDayCruiseBoatTravelPackageIds = FullDayCruise::distinct()
            ->pluck('boat_travel_package_id');
        $openTripTravelPackageIds = TravelOpenTrip::distinct()
            ->pluck('travel_package_id');
        $privateTravelPackageIds = TravelPrivateTrip::distinct()
            ->pluck('travel_package_id');

        $data['navbarOpenTrips'] = BoatTravelPackage::whereIn('id', $openTripBoatTravelPackageIds)->get();
        $data['navbarPrivateTrips'] = BoatTravelPackage::whereIn('id', $privateBoatTravelPackageIds)->get();
        $data['navbarFullDayCruises'] = BoatTravelPackage::whereIn('id', $FullDayCruiseBoatTravelPackageIds)->get();
        $data['navbarTravelOpenTrips'] = TravelPackage::whereIn('id', $openTripTravelPackageIds)->get();
        $data['navbarTravelPrivateTrips'] = TravelPackage::whereIn('id', $privateTravelPackageIds)->get();

        return $data;
    }

}
