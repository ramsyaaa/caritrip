<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoatTravelPackageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BoatTravelPackageImageController extends Controller
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
        $boat_travel_image = BoatTravelPackageImage::where('boat_travel_package_id', $id)->latest()->paginate($perPage);
        $data['boat_travel_image'] = $boat_travel_image;
        return view('admin.boat-travel-package-image.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['boat_travel_package_id'] = $id;
        return view('admin.boat-travel-package-image.create', $data);
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
            'image' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['boat_travel_package_id'] = $id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['image'] = 'uploads/' . $filename;
        }

        BoatTravelPackageImage::create($requestData);
        alert()->success('New ' . 'Image'. ' Created!' );

        return redirect('admin/boat-travel-package/' . $id . '/images');
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
        $data['boatimage'] = BoatTravelPackageImage::findOrFail($id);
        $data['boat_travel_package_id'] = $boat_travel_package_id;

        return view('admin.boat-travel-package-image.show', $data);
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
        $boatimage = BoatTravelPackageImage::findOrFail($id);
        $data['boatimage'] = $boatimage;
        $data['boat_travel_package_id'] = $boat_travel_package_id;
        return view('admin.boat-travel-package-image.edit', $data);
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
        $requestData = $request->all();
        $boatimage = BoatTravelPackageImage::findOrFail($id);

        if ($request->hasFile('image')) {
            if (\File::exists(public_path($boatimage->image))) {
                \File::delete(public_path($boatimage->image));
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['image'] = 'uploads/' . $filename;
        }

        alert()->success('Record Updated!' );
        $boatimage->update($requestData);

        return redirect('admin/boat-travel-package/' . $boat_travel_package_id . '/images');
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
        $boatimage = BoatTravelPackageImage::findOrFail($id);
        if ($boatimage->image) {
            if (\File::exists(public_path($boatimage->image))) {
                \File::delete(public_path($boatimage->image));
            }
        }
        BoatTravelPackageImage::destroy($id);

        return redirect('admin/boat-travel-package/' . $boat_travel_package_id . '/images');
    }
}
