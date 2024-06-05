<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\BoatTravelTrip;
use App\Models\BoatTravelTripImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoatTravelTripImageController extends Controller
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
        $boattraveltripimage = BoatTravelTripImage::latest()->paginate($perPage);
        $data['boattraveltripimage'] = $boattraveltripimage;
        return view('admin.boat-travel-trip-image.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['trips'] = BoatTravelTrip::get();
        return view('admin.boat-travel-trip-image.create', $data);
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
            'trip_id' => 'required',
            'images' => 'required',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('images')) {
            $requestData['images'] = $request->images
                ->store('uploads', 'public');
                $requestData['images'] = 'storage/' . $requestData['images'];
        }

        $get_trip = BoatTravelTrip::where([
            'id' => $request->trip_id,
        ])->first();
        $requestData['package_id'] = $get_trip->package_id;

        BoatTravelTripImage::create($requestData);
        alert()->success('New ' . 'BoatTravelTripImage'. ' Created!' );

        return redirect('admin/boat-travel-trip-image');
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
        $boattraveltripimage = BoatTravelTripImage::findOrFail($id);

        return view('admin.boat-travel-trip-image.show', compact('boattraveltripimage'));
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
        $boattraveltripimage = BoatTravelTripImage::findOrFail($id);
        $data['boattraveltripimage'] = $boattraveltripimage;
        $data['trips'] = BoatTravelTrip::get();
        return view('admin.boat-travel-trip-image.edit', $data);
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
        $request->validate([
            'trip_id' => 'required',
            'images' => 'required',
        ]);

        $boattraveltripimage = BoatTravelTripImage::findOrFail($id);

        if ($request->hasFile('images')) {
            if ($boattraveltripimage->images) {
                $oldImagePath = str_replace('storage/', '', $boattraveltripimage->images);
                Storage::disk('public')->delete($oldImagePath);
            }
            $requestData['images'] = $request->images
                ->store('uploads', 'public');
            $requestData['images'] = 'storage/' . $requestData['images'];
        }

        $get_trip = BoatTravelTrip::where([
            'id' => $request->trip_id,
        ])->first();
        $requestData['package_id'] = $get_trip->package_id;

        alert()->success('Record Updated!' );
        $boattraveltripimage->update($requestData);

        return redirect('admin/boat-travel-trip-image');
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
        BoatTravelTripImage::destroy($id);

        return redirect('admin/boat-travel-trip-image');
    }
}
