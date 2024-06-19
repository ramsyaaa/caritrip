<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelOpenTrip;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class TravelOpenTripController extends Controller
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
        $data['travel_package_id'] = $id;
        $open_trips = TravelOpenTrip::where('travel_package_id', $id)->latest()->paginate($perPage);
        $data['open_trips'] = $open_trips;
        return view('admin.travel-open-trip.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['travel_package_id'] = $id;
        $boat_travel_package = TravelPackage::where(['id' => $id])->first();
        return view('admin.travel-open-trip.create', $data);
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
            'date' => 'required'
        ]);

        $requestData = $request->all();
        $requestData['travel_package_id'] = $id;
        $requestData['duration'] = $request->days . 'D' . $request->nights . 'N';

        TravelOpenTrip::create($requestData);
        alert()->success('New ' . 'Travel Open Trip'. ' Created!' );

        return redirect('admin/travel-package/' . $id . '/open-trip');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($travel_package_id, $id)
    {
        $data['open_trip'] = TravelOpenTrip::findOrFail($id);
        $data['travel_package_id'] = $travel_package_id;

        return view('admin.travel-open-trip.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($travel_package_id, $id)
    {
        $open_trip = TravelOpenTrip::findOrFail($id);
        $durationString = $open_trip->duration;
        preg_match('/(\d+)D(\d+)N/', $durationString, $matches);

        $days = isset($matches[1]) ? $matches[1] : 0;
        $nights = isset($matches[2]) ? $matches[2] : 0;
        $data['open_trip'] = $open_trip;
        $data['open_trip']->days = $days;
        $data['open_trip']->nights = $nights;
        $data['travel_package_id'] = $travel_package_id;
        $travel_package = TravelPackage::where(['id' => $travel_package_id])->first();

        return view('admin.travel-open-trip.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $travel_package_id, $id)
    {
        $request->validate([
            'days' => 'required|numeric',
            'nights' => 'required|numeric',
            'price' => 'required|numeric',
            'date' => 'required'
        ]);

        $requestData = $request->all();
        $requestData['duration'] = $request->days . 'D' . $request->nights . 'N';
        $open_trip = TravelOpenTrip::findOrFail($id);

        alert()->success('Record Updated!' );
        $open_trip->update($requestData);

        return redirect('admin/travel-package/' . $travel_package_id . '/open-trip');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($travel_package_id, $id)
    {
        alert()->success('Record Deleted!' );
        TravelOpenTrip::destroy($id);

        return redirect('admin/travel-package/' . $travel_package_id . '/open-trip');
    }
}
