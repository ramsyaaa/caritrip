<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Boat;
use App\Models\BoatTravelPackage;
use App\Models\Destination;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoatTravelPackageController extends Controller
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
        $boattravelpackage = BoatTravelPackage::latest()->paginate($perPage);
        $data['boattravelpackage'] = $boattravelpackage;
        return view('admin.boat-travel-package.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['boats'] = Boat::get();
        $data['languages'] = Language::get();
        $data['destinations'] = Destination::get();
        return view('admin.boat-travel-package.create', $data);
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
            'boat_id' => 'required',
            'package_key_visual' => 'required',
            'destination_id' => 'required',
            'trip_subcategory' => 'required',
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

        BoatTravelPackage::create($requestData);
        alert()->success('New ' . 'Boat Travel Package'. ' Created!' );

        return redirect('admin/boat-travel-package');
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
        $boattravelpackage = BoatTravelPackage::findOrFail($id);

        return view('admin.boat-travel-package.show', compact('boattravelpackage'));
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
        $boattravelpackage = BoatTravelPackage::findOrFail($id);
        $data['boattravelpackage'] = $boattravelpackage;
        $data['boats'] = Boat::get();
        $data['languages'] = Language::get();
        $data['destinations'] = Destination::get();
        return view('admin.boat-travel-package.edit', $data);
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
            'boat_id' => 'required',
            'destination_id' => 'required',
            'trip_subcategory' => 'required',
            'have_itenary' => 'required',
            'itenary_list' => 'required',
            'include_list' => 'required',
            'exclude_list' => 'required',
            'seo_meta_description' => 'required',
            'seo_meta_keywords' => 'required',
            'language_id' => 'required',
        ]);

        $requestData = $request->all();
        $boattravelpackage = BoatTravelPackage::findOrFail($id);
        if ($request->hasFile('package_key_visual')) {
            if ($boattravelpackage->package_key_visual) {
                $oldImagePath = str_replace('storage/', '', $boattravelpackage->package_key_visual);
                Storage::disk('public')->delete($oldImagePath);
            }
            $requestData['package_key_visual'] = $request->package_key_visual
                ->store('uploads/packages', 'public');
            $requestData['package_key_visual'] = 'storage/' . $requestData['package_key_visual'];
        }


        alert()->success('Record Updated!' );
        $boattravelpackage->update($requestData);

        return redirect('admin/boat-travel-package');
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
        $boattravelpackage = BoatTravelPackage::findOrFail($id);
        if ($boattravelpackage->package_key_visual) {
            $oldImagePath = str_replace('storage/', '', $boattravelpackage->package_key_visual);
            Storage::disk('public')->delete($oldImagePath);
        }

        BoatTravelPackage::destroy($id);

        return redirect('admin/boat-travel-package');
    }
}
