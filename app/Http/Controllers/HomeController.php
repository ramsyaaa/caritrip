<?php

namespace App\Http\Controllers;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Models\Blog;
use App\Models\BoatTravelPackage;
use App\Models\Page;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        UserLogHelper::userLog($request, 'home');
        $data = TripHelper::getNavbarTripsData();

        $data['packages'] = BoatTravelPackage::where(['is_popular' => true])->get();
        $data['travels'] = TravelPackage::where(['is_popular' => true])->get();
        $data['blogs'] = Blog::limit(9)->get();

        $page = Page::where(['page_category' => 'Home'])->first();
        $data['page_title'] = $page ? $page->page_title : '';
        $data['meta_page_breadcrumbs_title'] = $page ? $page->page_breadcrumbs_title : '';
        $data['meta_page_og_image'] = $page ? $page->page_og_image : '';
        $data['meta_page_banner_image'] = $page ? $page->page_banner_image : '';
        $data['meta_page_description'] = $page ? $page->page_meta_description : '';
        $data['meta_page_keywords'] = $page ? $page->page_meta_keywords : '';

        return view('traveller.id.home', $data);
    }
}
