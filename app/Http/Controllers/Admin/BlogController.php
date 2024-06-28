<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
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
        $blog = Blog::latest()->paginate($perPage);
        $data['blog'] = $blog;
        return view('admin.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['blog_categories'] = BlogCategory::get();
        return view('admin.blog.create', $data);
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
            'title' => 'required',
            'id_category' => 'required',
            'featured_image' => 'required',
            'slug' => 'required|unique:blogs',
            'content' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $requestData = $request->all();
        if ($request->hasFile('featured_image')) {
            // $requestData['featured_image'] = $request->featured_image
            //     ->store('uploads', 'public');
            //     $requestData['featured_image'] = 'storage/' . $requestData['featured_image'];

            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['featured_image'] = 'uploads/' . $filename;
        }

        Blog::create($requestData);
        alert()->success('New ' . 'Blog'. ' Created!' );

        return redirect('admin/blog');
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
        $blog = Blog::findOrFail($id);

        return view('admin.blog.show', compact('blog'));
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
        $blog = Blog::findOrFail($id);
        $data['blog'] = $blog;
        $data['blog_categories'] = BlogCategory::get();
        return view('admin.blog.edit', $data);
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
        $blog = Blog::findOrFail($id);

        if($request->slug == $blog->slug){
            $slug = 'required';
        }else{
            $slug = 'required|unique:blogs';
        }

        $request->validate([
            'title' => 'required',
            'id_category' => 'required',
            'slug' => $slug,
            'content' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('featured_image')) {
            if (\File::exists(public_path($blog->featured_image))) {
                \File::delete(public_path($blog->featured_image));
            }
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['featured_image'] = 'uploads/' . $filename;
        }

        $blog = Blog::findOrFail($id);
        alert()->success('Record Updated!' );
        $blog->update($requestData);

        return redirect('admin/blog');
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
        alert()->success('Record Deleted!' );
        $blog = Blog::where('id', $id)->first();
        if($blog->featured_image){
            if (\File::exists(public_path($blog->featured_image))) {
                \File::delete(public_path($blog->featured_image));
            }
        }

        Blog::destroy($id);

        return redirect('admin/blog');
    }
}
