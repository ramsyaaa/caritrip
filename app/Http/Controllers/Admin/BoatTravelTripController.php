<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\BoatTravelTrip;
use Illuminate\Http\Request;

class BoatTravelTripController extends Controller
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
        $boattraveltrip = BoatTravelTrip::latest()->paginate($perPage);
        $data['boattraveltrip'] = $boattraveltrip;
        return view('admin.boat-travel-trip.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.boat-travel-trip.create');
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
        
        BoatTravelTrip::create($requestData);
        alert()->success('New ' . 'BoatTravelTrip'. ' Created!' );

        return redirect('admin/boat-travel-trip');
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
        $boattraveltrip = BoatTravelTrip::findOrFail($id);

        return view('admin.boat-travel-trip.show', compact('boattraveltrip'));
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
        $boattraveltrip = BoatTravelTrip::findOrFail($id);
        $data['boattraveltrip'] = $boattraveltrip;
        return view('admin.boat-travel-trip.edit', $data);
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
        
        $boattraveltrip = BoatTravelTrip::findOrFail($id);
        alert()->success('Record Updated!' );
        $boattraveltrip->update($requestData);

        return redirect('admin/boat-travel-trip');
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
        BoatTravelTrip::destroy($id);

        return redirect('admin/boat-travel-trip');
    }
}
