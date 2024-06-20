<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\Request;
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
            $requestData['page_og_image'] = $request->page_og_image
            ->store('uploads/pages', 'public');
            $requestData['page_og_image'] = 'storage/' . $requestData['page_og_image'];
        }
        if ($request->hasFile('page_banner_image')) {
            $requestData['page_banner_image'] = $request->page_banner_image
            ->store('uploads/pages', 'public');
            $requestData['page_banner_image'] = 'storage/' . $requestData['page_banner_image'];
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
            if ($page->page_og_image) {
                $oldImagePath = str_replace('storage/', '', $page->page_og_image);
                Storage::disk('public')->delete($oldImagePath);
            }
            $requestData['page_og_image'] = $request->page_og_image
                ->store('uploads/pages', 'public');
            $requestData['page_og_image'] = 'storage/' . $requestData['page_og_image'];
        }

        if ($request->hasFile('page_banner_image')) {
            if ($page->page_banner_image) {
                $oldImagePath = str_replace('storage/', '', $page->page_banner_image);
                Storage::disk('public')->delete($oldImagePath);
            }
            $requestData['page_banner_image'] = $request->page_banner_image
                ->store('uploads/pages', 'public');
            $requestData['page_banner_image'] = 'storage/' . $requestData['page_banner_image'];
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
            $oldImagePath = str_replace('storage/', '', $page->page_og_image);
            Storage::disk('public')->delete($oldImagePath);
        }
        if ($page->page_banner_image) {
                $oldImagePath = str_replace('storage/', '', $page->page_banner_image);
                Storage::disk('public')->delete($oldImagePath);
            }

        Page::destroy($id);

        return redirect('admin/page');
    }
}
