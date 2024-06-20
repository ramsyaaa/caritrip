<?php

namespace App\Http\Controllers\Traveller;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Http\Controllers\Controller;
use App\Models\Boat;
use App\Models\Page;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function index(Request $request){
        UserLogHelper::userLog($request, 'boat');
        $data = TripHelper::getNavbarTripsData();

        $boatTravelPackageIds = [];
        $data['category'] = null;

        $data['boats'] = Boat::get();

        $page = Page::where(['page_category' => 'Boats'])->first();
        $data['page_title'] = $page ? $page->page_title : '';
        $data['meta_page_breadcrumbs_title'] = $page ? $page->page_breadcrumbs_title : '';
        $data['meta_page_og_image'] = $page ? $page->page_og_image : '';
        $data['meta_page_banner_image'] = $page ? $page->page_banner_image : '';
        $data['meta_page_description'] = $page ? $page->page_meta_description : '';
        $data['meta_page_keywords'] = $page ? $page->page_meta_keywords : '';

        return view('traveller.id.boats.boats', $data);
    }
}
