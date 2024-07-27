<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FullDayCruise;
use Illuminate\Http\Request;

class FullDayCruiseController extends Controller
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
        $full_day_cruise = FullDayCruise::where('boat_travel_package_id', $id)->latest()->paginate($perPage);
        $data['full_day_cruises'] = $full_day_cruise;
        return view('admin.full-day-cruise.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['boat_travel_package_id'] = $id;
        return view('admin.full-day-cruise.create', $data);
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
            'price' => 'required|numeric',
            'pax' => 'required',
        ]);

        if($request->per_pax != "on" && $request->per_day != "on"){
            return redirect()->back()->withErrors(['per_pax' => 'You must select either per pax or per day.'])->withInput();
        }

        $requestData = $request->all();
        $requestData['boat_travel_package_id'] = $id;
        $requestData['duration'] = $request->days . 'D';

        $requestData['unit'] = "";

        if($request->per_pax == "on"){
            $requestData['unit'] = $requestData['unit'] . "/pax";
        }
        if($request->per_day == "on"){
            $requestData['unit'] = $requestData['unit'] . "/day";
        }

        FullDayCruise::create($requestData);
        alert()->success('New ' . 'Full Day Cruise'. ' Created!' );

        return redirect('admin/boat-travel-package/' . $id . '/full-day-cruise');
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
        $data['full_day_cruise'] = FullDayCruise::findOrFail($id);
        $data['boat_travel_package_id'] = $boat_travel_package_id;

        return view('admin.full-day-cruise.show', $data);
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
        $full_day_cruise = FullDayCruise::findOrFail($id);
        $durationString = $full_day_cruise->duration;
        preg_match('/(\d+)D/', $durationString, $matches);

        $priceUnit = $full_day_cruise->unit;

        $full_day_cruise->per_pax = str_contains($priceUnit, '/pax');
        $full_day_cruise->per_day = str_contains($priceUnit, '/day');

        $days = isset($matches[1]) ? $matches[1] : 0;
        $data['full_day_cruise'] = $full_day_cruise;
        $data['full_day_cruise']->days = $days;
        $data['boat_travel_package_id'] = $boat_travel_package_id;

        return view('admin.full-day-cruise.edit', $data);
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
            'price' => 'required|numeric',
            'pax' => 'required',
        ]);

        if($request->per_pax != "on" && $request->per_day != "on"){
            return redirect()->back()->withErrors(['per_pax' => 'You must select either per pax or per day.'])->withInput();
        }

        $requestData = $request->all();
        $requestData['duration'] = $request->days . 'D';
        $full_day_cruise = FullDayCruise::findOrFail($id);
        $requestData['unit'] = "";

        if($request->per_pax == "on"){
            $requestData['unit'] = $requestData['unit'] . "/pax";
        }
        if($request->per_day == "on"){
            $requestData['unit'] = $requestData['unit'] . "/day";
        }

        alert()->success('Record Updated!' );
        $full_day_cruise->update($requestData);

        return redirect('admin/boat-travel-package/' . $boat_travel_package_id . '/full-day-cruise');
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
        FullDayCruise::destroy($id);

        return redirect('admin/boat-travel-package/' . $boat_travel_package_id . '/full-day-cruise');
    }
}
