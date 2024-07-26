<?php

namespace App\Http\Controllers\Traveller;

use App\Helpers\TripHelper;
use App\Helpers\UserLogHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Page;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
        UserLogHelper::userLog($request, 'blog');
        $data = TripHelper::getNavbarTripsData();

        $packages = TravelPackage::with('destination')->get();

        $category = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $query = Blog::limit(20);

        // Tambahkan kondisi where jika parameter 'category' ada
        $data['category'] = null;
        if ($category) {
            $data['category'] =BlogCategory::where([
                'id' => $category,
            ])->first();
            $query->where('id_category', $category);
        }

        // Ambil data blogs berdasarkan query
        $data['blogs'] = $query->get();
        $data['latest_blogs'] = Blog::latest()->limit(10)->get();

        $page = Page::where(['page_category' => 'Blogs'])->first();
        $data['page_title'] = $page ? $page->page_title : '';
        $data['meta_page_breadcrumbs_title'] = $page ? $page->page_breadcrumbs_title : '';
        $data['meta_page_og_image'] = $page ? $page->page_og_image : '';
        $data['meta_page_banner_image'] = $page ? $page->page_banner_image : '';
        $data['meta_page_description'] = $page ? $page->page_meta_description : '';
        $data['meta_page_keywords'] = $page ? $page->page_meta_keywords : '';

        return view('traveller.id.blogs.index', $data);
    }

    public function show(Request $request, $slug){
        UserLogHelper::userLog($request, 'blog');
        $data = TripHelper::getNavbarTripsData();

        $data['blog'] = Blog::where([
            'slug' => $slug,
        ])->first();
        if($data['blog'] == null){
            return abort(404);
        }
        $data['related_blogs'] = Blog::where(['id_category' => $data['blog']->id_category])->latest()->limit(5)->get();
        $data['blogs'] = Blog::latest()->limit(5)->get();

        $data['page_title'] = $data['blog'] ? "CariTrip - " . $data['blog']->title : '';
        $data['meta_page_breadcrumbs_title'] = $data['blog'] ? $data['blog']->title : '';
        $data['meta_page_og_image'] = $data['blog'] ? $data['blog']->featured_image : '';
        $data['meta_page_banner_image'] = $data['blog'] ? $data['blog']->featured_image : '';
        $data['meta_page_description'] = $data['blog'] ? $data['blog']->meta_description : '';
        $data['meta_page_keywords'] = $data['blog'] ? $data['blog']->meta_keywords : '';

        return view('traveller.id.blogs.show', $data);
    }
}
