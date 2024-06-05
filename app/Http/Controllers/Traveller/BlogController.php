<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $data['blogs'] = Blog::limit(20)->get();
        $data['latest_blogs'] = Blog::latest()->limit(10)->get();
        return view('traveller.id.blogs.index', $data);
    }

    public function show(Request $request, $slug){
        $data['blog'] = Blog::where([
            'slug' => $slug,
        ])->first();
        $data['blogs'] = Blog::latest()->limit(5)->get();
        return view('traveller.id.blogs.show', $data);
    }
}
