<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoatTravelPackage;
use App\Models\Country;
use App\Models\Destination;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DestinationController extends Controller
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
        $destinations = Destination::latest()->paginate($perPage);
        $data['destinations'] = $destinations;
        return view('admin.destination.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['countries'] = Country::get();
        return view('admin.destination.create', $data);
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
            'name' => 'required',
            'destination_image' => 'required',
            'description' => 'required',
            "country_id" => 'required',
            'is_international' => ''
        ]);

        $requestData = $request->all();

         if ($request->hasFile('destination_image')) {
                $image = $request->file('destination_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                // Kompres gambar
                $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/' . $filename), 75);

                $requestData['destination_image'] = 'uploads/' . $filename;
        }

        Destination::create([
            'name' => $request->name,
            'is_international' => $request->is_international == 'on' ? 1 : 0,
            'destination_image' => 'uploads/' . $filename,
            'description' => $request->description,
            "country_id" => $request->country_id,
        ]);
        alert()->success('New ' . 'Destination'. ' Created!' );

        return redirect('admin/destination');
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
        $destination = Destination::findOrFail($id);

        return view('admin.destination.show', compact('destination'));
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
        $destination = Destination::findOrFail($id);
        $data['destination'] = $destination;
        $data['countries'] = Country::get();
        return view('admin.destination.edit', $data);
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
        $destination = Destination::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            "country_id" => 'required',
        ]);
        $requestData = $request->all();

        $filename = "";
        if ($request->hasFile('destination_image')) {
            if ($destination->destination_image) {
                if (\File::exists(public_path($destination->destination_image))) {
                    \File::delete(public_path($destination->destination_image));
                }

                $image = $request->file('destination_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                // Kompres gambar
                $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/' . $filename), 75);

                $requestData['destination_image'] = 'uploads/' . $filename;
            }
        }

        $destination = Destination::findOrFail($id);
        alert()->success('Record Updated!' );
        $destination->update([
            'name' => $request->name,
            'is_international' => $request->is_international == 'on' ? 1 : 0,
            'destination_image' => 'uploads/' . $filename,
            'description' => $request->description,
            "country_id" => $request->country_id,
        ]);

        return redirect('admin/destination');
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
        $destination = Destination::where(['id' => $id])->first();

        $checkBoatPackage = BoatTravelPackage::where([
            'destination_id' => $id
        ])->first();
        $checkTravelPackage = TravelPackage::where([
            'destination_id' => $id,
        ])->first();

        if($checkBoatPackage != null || $checkTravelPackage != null){
            alert()->error("Destinasi ini digunakan di paket kapal atau paket travel, ubah destinasi di sana terlebih dahulu." );
            return redirect()->back();
        }

        if ($destination->destination_image) {
            if (\File::exists(public_path($destination->destination_image))) {
                \File::delete(public_path($destination->destination_image));
            }
        }
        Destination::destroy($id);

        return redirect('admin/destination');
    }
}
