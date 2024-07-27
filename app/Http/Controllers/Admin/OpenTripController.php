<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoatTravelPackage;
use App\Models\Cabin;
use App\Models\OpenTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OpenTripController extends Controller
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
        $open_trips = OpenTrip::where('boat_travel_package_id', $id)->latest()->paginate($perPage);
        $data['open_trips'] = $open_trips;
        return view('admin.open-trip.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['boat_travel_package_id'] = $id;
        $boat_travel_package = BoatTravelPackage::where(['id' => $id])->first();
        $data['cabins'] = Cabin::where('boat_id', $boat_travel_package->boat_id)->get();
        return view('admin.open-trip.create', $data);
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
            'cabin_id' => 'required',
            'days' => 'required|numeric',
            'nights' => 'required|numeric',
            'price' => 'required|numeric',
            'extra_bed_price' => '',
        ]);

        if($request->per_pax != "on" && $request->per_day != "on"){
            return redirect()->back()->withErrors(['per_pax' => 'You must select either per pax or per day.'])->withInput();
        }

        $requestData = $request->all();
        $requestData['boat_travel_package_id'] = $id;
        $requestData['duration'] = $request->days . 'D' . $request->nights . 'N';

        $requestData['unit'] = "";

        if($request->per_pax == "on"){
            $requestData['unit'] = $requestData['unit'] . "/pax";
        }
        if($request->per_day == "on"){
            $requestData['unit'] = $requestData['unit'] . "/day";
        }

        OpenTrip::create($requestData);
        alert()->success('New ' . 'Open Trip'. ' Created!' );

        return redirect('admin/boat-travel-package/' . $id . '/open-trip');
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
        $data['open_trip'] = OpenTrip::findOrFail($id);
        $data['boat_travel_package_id'] = $boat_travel_package_id;

        return view('admin.open-trip.show', $data);
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
        $open_trip = OpenTrip::findOrFail($id);
        $durationString = $open_trip->duration;
        preg_match('/(\d+)D(\d+)N/', $durationString, $matches);
        $priceUnit = $open_trip->unit;

        $open_trip->per_pax = str_contains($priceUnit, '/pax');
        $open_trip->per_day = str_contains($priceUnit, '/day');

        $days = isset($matches[1]) ? $matches[1] : 0;
        $nights = isset($matches[2]) ? $matches[2] : 0;
        $data['open_trip'] = $open_trip;
        $data['open_trip']->days = $days;
        $data['open_trip']->nights = $nights;
        $data['boat_travel_package_id'] = $boat_travel_package_id;
        $boat_travel_package = BoatTravelPackage::where(['id' => $boat_travel_package_id])->first();
        $data['cabins'] = Cabin::where('boat_id', $boat_travel_package->boat_id)->get();

        return view('admin.open-trip.edit', $data);
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
            'cabin_id' => 'required',
            'days' => 'required|numeric',
            'nights' => 'required|numeric',
            'price' => 'required|numeric',
            'extra_bed_price' => '',
        ]);

        if($request->per_pax != "on" && $request->per_day != "on"){
            return redirect()->back()->withErrors(['per_pax' => 'You must select either per pax or per day.'])->withInput();
        }

        $requestData = $request->all();
        $requestData['duration'] = $request->days . 'D' . $request->nights . 'N';
        $open_trip = OpenTrip::findOrFail($id);
        $requestData['unit'] = "";

        if($request->per_pax == "on"){
            $requestData['unit'] = $requestData['unit'] . "/pax";
        }
        if($request->per_day == "on"){
            $requestData['unit'] = $requestData['unit'] . "/day";
        }

        alert()->success('Record Updated!' );
        $open_trip->update($requestData);

        return redirect('admin/boat-travel-package/' . $boat_travel_package_id . '/open-trip');
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
        OpenTrip::destroy($id);

        return redirect('admin/boat-travel-package/' . $boat_travel_package_id . '/open-trip');
    }
}
