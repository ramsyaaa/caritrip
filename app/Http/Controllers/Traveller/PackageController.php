<?php

namespace App\Http\Controllers\Traveller;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Http\Controllers\Controller;
use App\Models\BoatTravelPackage;
use App\Models\Destination;
use App\Models\FullDayCruise;
use App\Models\OpenTrip;
use App\Models\Page;
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
        $data['destination_id'] = $request->input('destination_id');

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
                    if($data['destination_id'] != null){
                        $data['trips'] = BoatTravelPackage::where(['destination_id' => $data['destination_id']])->whereIn('id', $boatTravelPackageIds)->get();
                    }else{
                        $data['trips'] = BoatTravelPackage::whereIn('id', $boatTravelPackageIds)->get();
                    }

                } else {
                    if($data['destination_id'] != null){
                        $data['trips'] = BoatTravelPackage::where(['destination_id' => $data['destination_id']])->get();
                    }else{
                        $data['trips'] = BoatTravelPackage::get();
                    }
                }
                // Set travels to an empty collection as type is boat trip
                $data['travels'] = collect();
            } elseif ($data['type'] == 'Travel Trip') {
                if(count($travelPackageIds) > 0) {
                    if($data['destination_id'] != null){
                        $data['travels'] = TravelPackage::where(['destination_id' => $data['destination_id']])->whereIn('id', $travelPackageIds)->get();
                    }else{
                        $data['travels'] = TravelPackage::whereIn('id', $travelPackageIds)->get();
                    }
                } else {
                    if($data['destination_id'] != null){
                        $data['travels'] = TravelPackage::where(['destination_id' => $data['destination_id']])->get();
                    }else{
                        $data['travels'] = TravelPackage::get();
                    }
                }
                // Set trips to an empty collection as type is travel trip
                $data['trips'] = collect();
            } else {
                // If type is not specified or invalid, set both
                if(count($boatTravelPackageIds) > 0) {
                    if($data['destination_id'] != null){
                        $data['trips'] = BoatTravelPackage::where(['destination_id' => $data['destination_id']])->whereIn('id', $boatTravelPackageIds)->get();
                    }else{
                        $data['trips'] = BoatTravelPackage::whereIn('id', $boatTravelPackageIds)->get();
                    }
                } else {
                    if($data['destination_id'] != null){
                        $data['trips'] = BoatTravelPackage::where(['destination_id' => $data['destination_id']])->get();
                    }else{
                        $data['trips'] = BoatTravelPackage::get();
                    }
                }
                if(count($travelPackageIds) > 0) {
                    if($data['destination_id'] != null){
                        $data['travels'] = TravelPackage::where(['destination_id' => $data['destination_id']])->whereIn('id', $travelPackageIds)->get();
                    }else{
                        $data['travels'] = TravelPackage::whereIn('id', $travelPackageIds)->get();
                    }
                } else {
                    if($data['destination_id'] != null){
                        $data['travels'] = TravelPackage::where(['destination_id' => $data['destination_id']])->get();
                    }else{
                        $data['travels'] = TravelPackage::get();
                    }
                }
            }
        } else {
            // If type is not specified, set both trips and travels
            if(count($boatTravelPackageIds) > 0) {
                if($data['destination_id'] != null){
                    $data['trips'] = BoatTravelPackage::where(['destination_id' => $data['destination_id']])->whereIn('id', $boatTravelPackageIds)->get();
                }else{
                    $data['trips'] = BoatTravelPackage::whereIn('id', $boatTravelPackageIds)->get();
                }
            } else {
                if($data['destination_id'] != null){
                    $data['trips'] = BoatTravelPackage::where(['destination_id' => $data['destination_id']])->get();
                }else{
                    $data['trips'] = BoatTravelPackage::get();
                }

            }
            if(count($travelPackageIds) > 0) {
                if($data['destination_id'] != null){
                    $data['travels'] = TravelPackage::where(['destination_id' => $data['destination_id']])->whereIn('id', $travelPackageIds)->get();
                }else{
                    $data['travels'] = TravelPackage::whereIn('id', $travelPackageIds)->get();
                }

            } else {
                if($data['destination_id'] != null){
                    $data['travels'] = TravelPackage::where(['destination_id' => $data['destination_id']])->get();
                }else{
                    $data['travels'] = TravelPackage::get();
                }
            }
        }

        if($data['destination_id'] != null){
            $data['destination'] = Destination::where(['id' => $data['destination_id']])->first();
        }else{
            $data['destination'] = null;
        }

        $page = Page::where(['page_category' => 'Packages'])->first();
        $data['page_title'] = $page ? $page->page_title : '';
        $data['meta_page_breadcrumbs_title'] = $page ? $page->page_breadcrumbs_title : '';
        $data['meta_page_og_image'] = $page ? $page->page_og_image : '';
        $data['meta_page_banner_image'] = $page ? $page->page_banner_image : '';
        $data['meta_page_description'] = $page ? $page->page_meta_description : '';
        $data['meta_page_keywords'] = $page ? $page->page_meta_keywords : '';

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

        $data['page_title'] = $data['package'] ? $data['package']->package_name : '';
        $data['meta_page_breadcrumbs_title'] = $data['package'] ? $data['package']->package_name : '';
        $data['meta_page_og_image'] = $data['package'] ? $data['package']->package_key_visual : '';
        $data['meta_page_banner_image'] = $data['package'] ? $data['package']->package_key_visual : '';
        $data['meta_page_description'] = $data['package'] ? $data['package']->seo_meta_description : '';
        $data['meta_page_keywords'] = $data['package'] ? $data['package']->seo_meta_keywords : '';

        return view('traveller.id.packages.detail', $data);
    }
}
