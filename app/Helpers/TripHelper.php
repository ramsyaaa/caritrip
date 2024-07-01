<?php
namespace App\Helpers;

use App\Models\BoatTravelPackage;
use App\Models\Destination;
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


        $destinations = Destination::get();
        $destinations = $destinations->groupBy(function($destination) {
            return $destination->country->name; // Ganti 'name' dengan kolom yang sesuai di tabel Destination
        });
        $data['destinations_navbar'] = $destinations;

        $data_destination_international = Destination::where(['is_international' => true])->get();
        $list_international_destination = [];
        foreach ($data_destination_international as $key => $item) {
            $list_international_destination[] = $item->id;
        }
        $travel_international = TravelPackage::whereIn('destination_id', $list_international_destination)->get();

        $list_international_destination = [];
        foreach ($travel_international as $key => $item) {
            $list_international_destination[] = $item->destination_id;
        }

        $data['international'] = Destination::whereIn('id', $list_international_destination)->get();


        $data_destination_domestic = Destination::where(['is_international' => false])->get();
        $list_domestic_destination = [];
        foreach ($data_destination_domestic as $key => $item) {

            $navbarOpenTrips = BoatTravelPackage::where(['destination_id' => $item->id])->whereIn('id', $openTripBoatTravelPackageIds)->get();
            $navbarPrivateTrips = BoatTravelPackage::where(['destination_id' => $item->id])->whereIn('id', $privateBoatTravelPackageIds)->get();
            $navbarFullDayCruises = BoatTravelPackage::where(['destination_id' => $item->id])->whereIn('id', $FullDayCruiseBoatTravelPackageIds)->get();
            $list_domestic_destination[$item->name] = [
                "destination_id" => $item->id,
                "openTrips" => $navbarOpenTrips,
                'privateTrips' => $navbarPrivateTrips,
                'fullDayCruises' => $navbarFullDayCruises,
            ];
        }

        $data['domestics'] = $list_domestic_destination;

        return $data;
    }

}
