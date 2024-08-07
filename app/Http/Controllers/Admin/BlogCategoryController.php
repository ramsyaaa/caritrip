<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $blogcategory = BlogCategory::latest()->paginate($perPage);
        $data['blogcategory'] = $blogcategory;
        return view('admin.blog-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:blog_categories',
        ]);

        BlogCategory::create([
            'category_name' => $request->category_name,
        ]);

        alert()->success('New ' . 'BlogCategory'. ' Created!' );

        return redirect('admin/blog-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);

        return view('admin.blog-category.show', compact('blogcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        $data['blogcategory'] = $blogcategory;
        return view('admin.blog-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $blogcategory = BlogCategory::findOrFail($id);

        if($request->category_name == $blogcategory->category_name){
            $request->validate([
                'category_name' => 'required'
            ]);
        }else{
            $request->validate([
                'category_name' => 'required|unique:blog_categories',
            ]);
        }

        alert()->success('Record Updated!' );
        $blogcategory->update([
            'category_name' => $request->category_name
        ]);

        return redirect('admin/blog-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $checkBlog = Blog::where([
            'id_category' => $id,
        ])->first();

        if($checkBlog != null) {
            alert()->error('Tidak bisa menghapus kategori ini karena digunakan di blog' );
            return redirect('/admin/blog-category');
        }

        alert()->success('Record Deleted!' );
        BlogCategory::destroy($id);

        return redirect('admin/blog-category');
    }
}
