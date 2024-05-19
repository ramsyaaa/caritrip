<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Boat;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoatController extends Controller
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
        $boat = Boat::latest()->paginate($perPage);
        $data['boat'] = $boat;
        return view('admin.boat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['languages'] = Language::get();
        return view('admin.boat.create', $data);
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
            'boat_name' => 'required',
            'boat_length' => 'required',
            'boat_width' => 'required',
            'boat_depth' => 'required',
            'boat_speed' => 'required',
            'boat_year_built' => 'required',
            'boat_fuel_capacity' => 'required',
            'boat_water_capacity' => 'required',
            'boat_origin' => 'required',
            'boat_material' => 'required',
            'boat_main_engine' => 'required',
            'boat_dingy' => 'required',
            'boat_safety_equipment' => 'required',
            'boat_facility' => 'required',
            'boat_capacity' => 'required',
            'boat_entertainment' => 'required',
            'boat_featured_image' => 'required',
            'seo_meta_description' => 'required',
            'seo_meta_keywords' => 'required',
            'language_id' => 'required',

        ]);
        $requestData = $request->all();
        if ($request->hasFile('boat_featured_image')) {
            $requestData['boat_featured_image'] = $request->boat_featured_image
            ->store('uploads', 'public');
            $requestData['boat_featured_image'] = 'storage/' . $requestData['boat_featured_image'];
        }

        Boat::create($requestData);
        alert()->success('New ' . 'Boat'. ' Created!' );

        return redirect('admin/boat');
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
        $boat = Boat::findOrFail($id);

        return view('admin.boat.show', compact('boat'));
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
        $boat = Boat::findOrFail($id);
        $data['boat'] = $boat;
        $data['languages'] = Language::get();
        return view('admin.boat.edit', $data);
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
            'boat_name' => 'required',
            'boat_length' => 'required',
            'boat_width' => 'required',
            'boat_depth' => 'required',
            'boat_speed' => 'required',
            'boat_year_built' => 'required',
            'boat_fuel_capacity' => 'required',
            'boat_water_capacity' => 'required',
            'boat_origin' => 'required',
            'boat_material' => 'required',
            'boat_main_engine' => 'required',
            'boat_dingy' => 'required',
            'boat_safety_equipment' => 'required',
            'boat_facility' => 'required',
            'boat_capacity' => 'required',
            'boat_entertainment' => 'required',
            'seo_meta_description' => 'required',
            'seo_meta_keywords' => 'required',
            'language_id' => 'required',

        ]);

        $boat = Boat::findOrFail($id);

        $requestData = $request->all();
        if ($request->hasFile('boat_featured_image')) {
            if ($boat->boat_featured_image) {
                $oldImagePath = str_replace('storage/', '', $boat->boat_featured_image);
                Storage::disk('public')->delete($oldImagePath);
            }
            $requestData['boat_featured_image'] = $request->boat_featured_image
                ->store('uploads', 'public');
            $requestData['boat_featured_image'] = 'storage/' . $requestData['boat_featured_image'];
        }


        alert()->success('Record Updated!' );
        $boat->update($requestData);

        return redirect('admin/boat');
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
        Boat::destroy($id);

        return redirect('admin/boat');
    }
}
