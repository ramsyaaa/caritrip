<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelPackageImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;

class TravelPackageImageController extends Controller
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
        $travel_image = TravelPackageImage::where('travel_package_id', $id)->latest()->paginate($perPage);
        $data['travel_image'] = $travel_image;
        return view('admin.travel-package-image.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['travel_package_id'] = $id;
        return view('admin.travel-package-image.create', $data);
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
        $requestData['travel_package_id'] = $id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['image'] = 'uploads/' . $filename;
        }

        TravelPackageImage::create($requestData);
        alert()->success('New ' . 'Image'. ' Created!' );

        return redirect('admin/travel-package/' . $id . '/images');
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
        $data['travel_image'] = TravelPackageImage::findOrFail($id);
        $data['travel_package_id'] = $travel_package_id;

        return view('admin.travel-package-image.show', $data);
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
        $travel_image = TravelPackageImage::findOrFail($id);
        $data['travel_image'] = $travel_image;
        $data['travel_package_id'] = $travel_package_id;
        return view('admin.travel-package-image.edit', $data);
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
        $requestData = $request->all();
        $travel_image = TravelPackageImage::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($travel_image->image) {
                if (\File::exists(public_path($travel_image->image))) {
                    \File::delete(public_path($travel_image->image));
                }

                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                // Kompres gambar
                $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/' . $filename), 75);

                $requestData['image'] = 'uploads/' . $filename;
            }
        }

        alert()->success('Record Updated!' );
        $travel_image->update($requestData);

        return redirect('admin/travel-package/' . $travel_package_id . '/images');
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
        $travel_image = TravelPackageImage::findOrFail($id);
        if ($travel_image->image) {
            if (\File::exists(public_path($travel_image->image))) {
                \File::delete(public_path($travel_image->image));
            }
        }
        TravelPackageImage::destroy($id);

        return redirect('admin/travel-package/' . $travel_package_id . '/images');
    }
}
