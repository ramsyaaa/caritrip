<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\BoatTravelTripImage;
use Illuminate\Http\Request;

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
        return view('admin.boat-travel-trip-image.create');
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
        
        $boattraveltripimage = BoatTravelTripImage::findOrFail($id);
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
