<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoatTravelPackage;
use App\Models\PrivateTrip;
use Illuminate\Http\Request;

class PrivateTripController extends Controller
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
    public function index(Request $request, $id)
    {
        $perPage = 25;
        $data['boat_travel_package_id'] = $id;
        $private_trips = PrivateTrip::where('boat_travel_package_id', $id)->latest()->paginate($perPage);
        $data['private_trips'] = $private_trips;
        return view('admin.private-trip.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['boat_travel_package_id'] = $id;
        return view('admin.private-trip.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'days' => 'required|numeric',
            'nights' => 'required|numeric',
            'price' => 'required|numeric',
            'extra_pax_price' => '',
            'pax' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['boat_travel_package_id'] = $id;
        $requestData['duration'] = $request->days . 'D' . $request->nights . 'N';

        PrivateTrip::create($requestData);
        alert()->success('New ' . 'Private Trip'. ' Created!' );

        return redirect('admin/boat-travel-package/' . $id . '/private-trip');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($boat_travel_package_id, $id)
    {
        $data['private_trip'] = PrivateTrip::findOrFail($id);
        $data['boat_travel_package_id'] = $boat_travel_package_id;

        return view('admin.private-trip.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($boat_travel_package_id, $id)
    {
        $private_trip = PrivateTrip::findOrFail($id);
        $durationString = $private_trip->duration;
        preg_match('/(\d+)D(\d+)N/', $durationString, $matches);

        $days = isset($matches[1]) ? $matches[1] : 0;
        $nights = isset($matches[2]) ? $matches[2] : 0;
        $data['private_trip'] = $private_trip;
        $data['private_trip']->days = $days;
        $data['private_trip']->nights = $nights;
        $data['boat_travel_package_id'] = $boat_travel_package_id;

        return view('admin.private-trip.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $boat_travel_package_id, $id)
    {
        $request->validate([
            'days' => 'required|numeric',
            'nights' => 'required|numeric',
            'price' => 'required|numeric',
            'extra_pax_price' => '',
            'pax' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['duration'] = $request->days . 'D' . $request->nights . 'N';
        $open_trip = PrivateTrip::findOrFail($id);

        alert()->success('Record Updated!' );
        $open_trip->update($requestData);

        return redirect('admin/boat-travel-package/' . $boat_travel_package_id . '/private-trip');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($boat_travel_package_id, $id)
    {
        alert()->success('Record Deleted!' );
        PrivateTrip::destroy($id);

        return redirect('admin/boat-travel-package/' . $boat_travel_package_id . '/private-trip');
    }
}
