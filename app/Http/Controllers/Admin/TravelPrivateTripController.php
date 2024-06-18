<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelPrivateTrip;
use Illuminate\Http\Request;

class TravelPrivateTripController extends Controller
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
        $private_trips = TravelPrivateTrip::where('travel_package_id', $id)->latest()->paginate($perPage);
        $data['private_trips'] = $private_trips;
        return view('admin.travel-private-trip.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['travel_package_id'] = $id;
        return view('admin.travel-private-trip.create', $data);
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
            'pax' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['travel_package_id'] = $id;
        $requestData['duration'] = $request->days . 'D' . $request->nights . 'N';

        TravelPrivateTrip::create($requestData);
        alert()->success('New ' . 'Travel Private Trip'. ' Created!' );

        return redirect('admin/travel-package/' . $id . '/private-trip');
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
        $data['private_trip'] = TravelPrivateTrip::findOrFail($id);
        $data['travel_package_id'] = $travel_package_id;

        return view('admin.travel-private-trip.show', $data);
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
        $private_trip = TravelPrivateTrip::findOrFail($id);
        $durationString = $private_trip->duration;
        preg_match('/(\d+)D(\d+)N/', $durationString, $matches);

        $days = isset($matches[1]) ? $matches[1] : 0;
        $nights = isset($matches[2]) ? $matches[2] : 0;
        $data['private_trip'] = $private_trip;
        $data['private_trip']->days = $days;
        $data['private_trip']->nights = $nights;
        $data['travel_package_id'] = $travel_package_id;

        return view('admin.travel-private-trip.edit', $data);
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
            'pax' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['duration'] = $request->days . 'D' . $request->nights . 'N';
        $open_trip = TravelPrivateTrip::findOrFail($id);

        alert()->success('Record Updated!' );
        $open_trip->update($requestData);

        return redirect('admin/travel-package/' . $travel_package_id . '/private-trip');
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
        TravelPrivateTrip::destroy($id);

        return redirect('admin/travel-package/' . $travel_package_id . '/private-trip');
    }
}

