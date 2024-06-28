<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Boat;
use App\Models\BoatImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
    public function index(Request $request, $id)
    {
        $perPage = 25;
        $data['boat_id'] = $id;
        $boatimage = BoatImage::where('boat_id', $id)->latest()->paginate($perPage);
        $data['boatimage'] = $boatimage;
        return view('admin.boat-image.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['boats'] = Boat::get();
        $data['boat_id'] = $id;
        return view('admin.boat-image.create', $data);
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
            'image_name' => 'required',
            'image_description' => 'required',
            'key_visual' => 'required'
        ]);

        $requestData = $request->all();
        $requestData['boat_id'] = $id;
        if ($request->hasFile('key_visual')) {
            $image = $request->file('key_visual');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['key_visual'] = 'uploads/' . $filename;
        }

        BoatImage::create($requestData);
        alert()->success('New ' . 'BoatImage'. ' Created!' );

        return redirect('admin/boat/' . $id . '/images');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($boat_id, $id)
    {
        $data['boatimage'] = BoatImage::findOrFail($id);
        $data['boat_id'] = $boat_id;

        return view('admin.boat-image.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($boat_id, $id)
    {
        $boatimage = BoatImage::findOrFail($id);
        $data['boatimage'] = $boatimage;
        $data['boats'] = Boat::get();
        $data['boat_id'] = $boat_id;
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
    public function update(Request $request, $boat_id, $id)
    {
        $request->validate([
            'image_name' => 'required',
            'image_description' => 'required',
        ]);

        $requestData = $request->all();
        $boatimage = BoatImage::findOrFail($id);

        if ($request->hasFile('key_visual')) {
            if (\File::exists(public_path($boatimage->key_visual))) {
                \File::delete(public_path($boatimage->key_visual));
            }

            $image = $request->file('key_visual');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['key_visual'] = 'uploads/' . $filename;
        }

        alert()->success('Record Updated!' );
        $boatimage->update($requestData);

        return redirect('admin/boat/'. $boat_id . '/images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($boat_id, $id)
    {
        alert()->success('Record Deleted!' );
        $boatimage = BoatImage::findOrFail($id);
        if ($boatimage->key_visual) {
            if (\File::exists(public_path($boatimage->key_visual))) {
                \File::delete(public_path($boatimage->key_visual));
            }
        }
        BoatImage::destroy($id);

        return redirect('admin/boat/' . $boat_id . '/images');
    }
}
