<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Language;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Storage;

class TravelPackageController extends Controller
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
        $travelpackage = TravelPackage::latest()->paginate($perPage);
        $data['travelpackage'] = $travelpackage;
        return view('admin.travel-package.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['languages'] = Language::get();
        $data['destinations'] = Destination::get();
        return view('admin.travel-package.create', $data);
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
            'package_name' => 'required',
            'package_key_visual' => 'required',
            'destination_id' => 'required',
            'have_itenary' => 'required',
            'itenary_list' => 'required',
            'include_list' => 'required',
            'exclude_list' => 'required',
            'seo_meta_description' => 'required',
            'seo_meta_keywords' => 'required',
            'language_id' => 'required',
        ]);

        $requestData = $request->all();
        if ($request->hasFile('package_key_visual')) {
            $requestData['package_key_visual'] = $request->package_key_visual
            ->store('uploads/packages', 'public');
            $requestData['package_key_visual'] = 'storage/' . $requestData['package_key_visual'];
        }

        TravelPackage::create($requestData);
        alert()->success('New ' . 'Travel Package'. ' Created!' );

        return redirect('admin/travel-package');
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
        $travelpackage = TravelPackage::findOrFail($id);

        return view('admin.travel-package.show', compact('travelpackage'));
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
        $travelpackage = TravelPackage::findOrFail($id);
        $data['travelpackage'] = $travelpackage;
        $data['languages'] = Language::get();
        $data['destinations'] = Destination::get();
        return view('admin.travel-package.edit', $data);
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
        $request->validate([
            'package_name' => 'required',
            'destination_id' => 'required',
            'have_itenary' => 'required',
            'itenary_list' => 'required',
            'include_list' => 'required',
            'exclude_list' => 'required',
            'seo_meta_description' => 'required',
            'seo_meta_keywords' => 'required',
            'language_id' => 'required',
        ]);

        $requestData = $request->all();
        $travelpackage = TravelPackage::findOrFail($id);
        if ($request->hasFile('package_key_visual')) {
            if ($travelpackage->package_key_visual) {
                $oldImagePath = str_replace('storage/', '', $travelpackage->package_key_visual);
                Storage::disk('public')->delete($oldImagePath);
            }
            $requestData['package_key_visual'] = $request->package_key_visual
                ->store('uploads/packages', 'public');
            $requestData['package_key_visual'] = 'storage/' . $requestData['package_key_visual'];
        }


        alert()->success('Record Updated!' );
        $travelpackage->update($requestData);

        return redirect('admin/travel-package');
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
        $travelpackage = TravelPackage::findOrFail($id);
        if ($travelpackage->package_key_visual) {
            $oldImagePath = str_replace('storage/', '', $travelpackage->package_key_visual);
            Storage::disk('public')->delete($oldImagePath);
        };
        TravelPackage::destroy($id);

        return redirect('admin/travel-package');
    }
}
