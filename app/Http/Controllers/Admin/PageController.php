<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;

class PageController extends Controller
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
        $page = Page::latest()->paginate($perPage);
        $data['page'] = $page;
        return view('admin.page.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['languages'] = Language::get();
        return view('admin.page.create', $data);
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

        $requestData = $request->all();

        if ($request->hasFile('page_og_image')) {
            $image = $request->file('page_og_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['page_og_image'] = 'uploads/' . $filename;
        }
        if ($request->hasFile('page_banner_image')) {
            $image = $request->file('page_banner_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['page_banner_image'] = 'uploads/' . $filename;
        }

        Page::create($requestData);
        alert()->success('New ' . 'Page'. ' Created!' );

        return redirect('admin/page');
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
        $page = Page::findOrFail($id);

        return view('admin.page.show', compact('page'));
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
        $page = Page::findOrFail($id);
        $data['page'] = $page;
        $data['languages'] = Language::get();
        return view('admin.page.edit', $data);
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

        $requestData = $request->all();
        $page = Page::findOrFail($id);
        if ($request->hasFile('page_og_image')) {
            if (\File::exists(public_path($page->page_og_image))) {
                \File::delete(public_path($page->page_og_image));
            }

            $image = $request->file('page_og_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['page_og_image'] = 'uploads/' . $filename;
        }

        if ($request->hasFile('page_banner_image')) {
            if (\File::exists(public_path($page->page_banner_image))) {
                \File::delete(public_path($page->page_banner_image));
            }

            $image = $request->file('page_banner_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['page_banner_image'] = 'uploads/' . $filename;
        }


        alert()->success('Record Updated!' );
        $page->update($requestData);

        return redirect('admin/page');
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
        $page = Page::findOrFail($id);
        if ($page->page_og_image) {
            if (\File::exists(public_path($page->page_og_image))) {
                \File::delete(public_path($page->page_og_image));
            }
        }
        if ($page->page_banner_image) {
                if (\File::exists(public_path($page->page_banner_image))) {
                    \File::delete(public_path($page->page_banner_image));
                }
            }

        Page::destroy($id);

        return redirect('admin/page');
    }
}
