<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Language;
use App\Models\TravelOpenTrip;
use App\Models\TravelPackage;
use App\Models\TravelPackageImage;
use App\Models\TravelPrivateTrip;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;

class TravelPackageController extends Controller
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
        $travelpackage = TravelPackage::latest()->paginate($perPage);
        $data['travelpackage'] = $travelpackage;
        return view('admin.travel-package.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['languages'] = Language::get();
        $data['destinations'] = Destination::get();
        return view('admin.travel-package.create', $data);
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
            'package_name' => 'required',
            'description' => 'required',
            'package_key_visual' => 'required',
            'destination_id' => 'required',
            'date_of_departure' => 'required',
            'have_itenary' => 'required',
            'itenary_list' => 'required',
            'include_list' => 'required',
            'exclude_list' => 'required',
            'seo_meta_description' => 'required',
            'seo_meta_keywords' => 'required',
            'language_id' => 'required',
        ]);

        $requestData = $request->all();
        if ($request->hasFile('package_key_visual')) {
            $image = $request->file('package_key_visual');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['package_key_visual'] = 'uploads/' . $filename;
        }

        $requestData['is_popular'] = $request->is_popular == 'on' ? 1 : 0;

        TravelPackage::create($requestData);
        alert()->success('New ' . 'Travel Package'. ' Created!' );

        return redirect('admin/travel-package');
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
        $travelpackage = TravelPackage::findOrFail($id);

        return view('admin.travel-package.show', compact('travelpackage'));
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
        $travelpackage = TravelPackage::findOrFail($id);
        $data['travelpackage'] = $travelpackage;
        $data['languages'] = Language::get();
        $data['destinations'] = Destination::get();
        return view('admin.travel-package.edit', $data);
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
            'package_name' => 'required',
            'description' => 'required',
            'destination_id' => 'required',
            'date_of_departure' => 'required',
            'have_itenary' => 'required',
            'itenary_list' => 'required',
            'include_list' => 'required',
            'exclude_list' => 'required',
            'seo_meta_description' => 'required',
            'seo_meta_keywords' => 'required',
            'language_id' => 'required',
        ]);

        $requestData = $request->all();
        $travelpackage = TravelPackage::findOrFail($id);
        if ($request->hasFile('package_key_visual')) {
            if (\File::exists(public_path($travelpackage->package_key_visual))) {
                \File::delete(public_path($travelpackage->package_key_visual));
            }

            $image = $request->file('package_key_visual');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['package_key_visual'] = 'uploads/' . $filename;
        }

        $requestData['is_popular'] = $request->is_popular == 'on' ? 1 : 0;


        alert()->success('Record Updated!' );
        $travelpackage->update($requestData);

        return redirect('admin/travel-package');
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
        $travelpackage = TravelPackage::findOrFail($id);
        if ($travelpackage->package_key_visual) {
            if (\File::exists(public_path($travelpackage->package_key_visual))) {
                \File::delete(public_path($travelpackage->package_key_visual));
            }
        };

        TravelOpenTrip::where([
            'travel_package_id' => $id,
        ])->delete();
        TravelPrivateTrip::where([
            'travel_package_id' => $id,
        ])->delete();

        $getImages = TravelPackageImage::where([
            'travel_package_id' => $id,
        ])->get();

        TravelPackageImage::where([
            'travel_package_id' => $id,
        ])->delete();

        foreach ($getImages as $key => $item) {
            if (\File::exists(public_path($item->image))) {
                \File::delete(public_path($item->image));
            }
        }

        TravelPackage::destroy($id);

        return redirect('admin/travel-package');
    }
}
