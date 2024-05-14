<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Boat;
use Illuminate\Http\Request;

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
        return view('admin.boat.create');
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
                if ($request->hasFile('boat_featured_image')) {
            $requestData['boat_featured_image'] = $request->file('boat_featured_image')
                ->store('', 'uploads');
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
        
        $requestData = $request->all();
                if ($request->hasFile('boat_featured_image')) {
            $requestData['boat_featured_image'] = $request->file('boat_featured_image')
                ->store('', 'uploads');
        }

        $boat = Boat::findOrFail($id);
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
