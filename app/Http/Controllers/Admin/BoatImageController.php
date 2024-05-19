<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Boat;
use App\Models\BoatImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoatImageController extends Controller
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
        $boatimage = BoatImage::latest()->paginate($perPage);
        $data['boatimage'] = $boatimage;
        return view('admin.boat-image.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['boats'] = Boat::get();
        return view('admin.boat-image.create', $data);
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
            'boat_id' => 'required',
            'image_name' => 'required',
            'image_description' => 'required',
            'key_visual' => 'required'
        ]);

        $requestData = $request->all();
        if ($request->hasFile('key_visual')) {
            $requestData['key_visual'] = $request->key_visual
                ->store('uploads', 'public');
                $requestData['key_visual'] = 'storage/' . $requestData['key_visual'];
        }

        BoatImage::create($requestData);
        alert()->success('New ' . 'BoatImage'. ' Created!' );

        return redirect('admin/boat-image');
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
        $boatimage = BoatImage::findOrFail($id);

        return view('admin.boat-image.show', compact('boatimage'));
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
        $boatimage = BoatImage::findOrFail($id);
        $data['boatimage'] = $boatimage;
        $data['boats'] = Boat::get();
        return view('admin.boat-image.edit', $data);
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
        $request->validate([
            'boat_id' => 'required',
            'image_name' => 'required',
            'image_description' => 'required',
        ]);

        $requestData = $request->all();
        $boatimage = BoatImage::findOrFail($id);

        if ($request->hasFile('key_visual')) {
            if ($boatimage->key_visual) {
                $oldImagePath = str_replace('storage/', '', $boatimage->key_visual);
                Storage::disk('public')->delete($oldImagePath);
            }
            $requestData['key_visual'] = $request->key_visual
                ->store('uploads', 'public');
            $requestData['key_visual'] = 'storage/' . $requestData['key_visual'];
        }

        alert()->success('Record Updated!' );
        $boatimage->update($requestData);

        return redirect('admin/boat-image');
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
        BoatImage::destroy($id);

        return redirect('admin/boat-image');
    }
}
