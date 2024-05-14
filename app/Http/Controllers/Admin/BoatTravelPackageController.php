<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\BoatTravelPackage;
use Illuminate\Http\Request;

class BoatTravelPackageController extends Controller
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
        $boattravelpackage = BoatTravelPackage::latest()->paginate($perPage);
        $data['boattravelpackage'] = $boattravelpackage;
        return view('admin.boat-travel-package.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.boat-travel-package.create');
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
                if ($request->hasFile('package_key_visual')) {
            $requestData['package_key_visual'] = $request->file('package_key_visual')
                ->store('', 'uploads');
        }

        BoatTravelPackage::create($requestData);
        alert()->success('New ' . 'BoatTravelPackage'. ' Created!' );

        return redirect('admin/boat-travel-package');
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
        $boattravelpackage = BoatTravelPackage::findOrFail($id);

        return view('admin.boat-travel-package.show', compact('boattravelpackage'));
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
        $boattravelpackage = BoatTravelPackage::findOrFail($id);
        $data['boattravelpackage'] = $boattravelpackage;
        return view('admin.boat-travel-package.edit', $data);
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
                if ($request->hasFile('package_key_visual')) {
            $requestData['package_key_visual'] = $request->file('package_key_visual')
                ->store('', 'uploads');
        }

        $boattravelpackage = BoatTravelPackage::findOrFail($id);
        alert()->success('Record Updated!' );
        $boattravelpackage->update($requestData);

        return redirect('admin/boat-travel-package');
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
        BoatTravelPackage::destroy($id);

        return redirect('admin/boat-travel-package');
    }
}
