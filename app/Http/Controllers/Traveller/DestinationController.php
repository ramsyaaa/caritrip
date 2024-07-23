<?php

namespace App\Http\Controllers\Traveller;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Page;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request){
        UserLogHelper::userLog($request, 'destinations');
        $data = TripHelper::getNavbarTripsData();

        $boatTravelPackageIds = [];
        $data['category'] = null;

        $data['destinations'] = Destination::get();

        $page = Page::where(['page_category' => 'Destinations'])->first();
        $data['page_title'] = $page ? $page->page_title : '';
        $data['meta_page_breadcrumbs_title'] = $page ? $page->page_breadcrumbs_title : '';
        $data['meta_page_og_image'] = $page ? $page->page_og_image : '';
        $data['meta_page_banner_image'] = $page ? $page->page_banner_image : '';
        $data['meta_page_description'] = $page ? $page->page_meta_description : '';
        $data['meta_page_keywords'] = $page ? $page->page_meta_keywords : '';

        return view('traveller.id.destinations.index', $data);
    }

    public function show(Request $request, $id){
        UserLogHelper::userLog($request, 'destinations');
        $data = TripHelper::getNavbarTripsData();

        $data['destination'] = Destination::findOrFail($id);
        $data['destinations'] = Destination::get();

        $data['page_title'] = $data['destination'] ? "CariTrip - " . $data['destination']->name : '';
        $data['meta_page_breadcrumbs_title'] = $data['destination'] ? $data['destination']->name : '';
        $data['meta_page_og_image'] = $data['destination'] ? $data['destination']->destination_image : '';
        $data['meta_page_banner_image'] = $data['destination'] ? $data['destination']->destination_image : '';
        $data['meta_page_description'] = $data['destination'] ? $data['destination']->description : '';
        $data['meta_page_keywords'] = $data['destination'] ? $data['destination']->description : '';

        return view('traveller.id.destinations.show', $data);
    }
}
