<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DestinationImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DestinationImageController extends Controller
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
        $data['destination_id'] = $id;
        $destinationimage = DestinationImage::where('destination_id', $id)->latest()->paginate($perPage);
        $data['destinationimage'] = $destinationimage;
        return view('admin.destination-image.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['destination_id'] = $id;
        return view('admin.destination-image.create', $data);
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
            'destination_image' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['destination_id'] = $id;
        if ($request->hasFile('destination_image')) {
            $image = $request->file('destination_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['destination_image'] = 'uploads/' . $filename;
        }

        DestinationImage::create($requestData);
        alert()->success('New ' . 'Destination Image'. ' Created!' );

        return redirect('admin/destination/' . $id . '/images');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($destination_id, $id)
    {
        $data['destinationimage'] = DestinationImage::findOrFail($id);
        $data['destination_id'] = $destination_id;

        return view('admin.destination-image.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($destination_id, $id)
    {
        $destination = DestinationImage::findOrFail($id);
        $data['destination'] = $destination;
        $data['destination_id'] = $destination_id;
        return view('admin.destination-image.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $destination_id, $id)
    {
        $request->validate([
            'destination_image' => 'required',
        ]);

        $requestData = $request->all();
        $destination_image = DestinationImage::findOrFail($id);

        if ($request->hasFile('destination_image')) {
            if (\File::exists(public_path($destination_image->destination_image))) {
                \File::delete(public_path($destination_image->destination_image));
            }

            $image = $request->file('destination_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Kompres gambar
            $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/' . $filename), 75);

            $requestData['destination_image'] = 'uploads/' . $filename;
        }

        alert()->success('Record Updated!' );
        $destination_image->update($requestData);

        return redirect('admin/destination/'. $destination_id . '/images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($destination_id, $id)
    {
        alert()->success('Record Deleted!' );
        $destinationimage = DestinationImage::findOrFail($id);
        if ($destinationimage->destination_image) {
            if (\File::exists(public_path($destinationimage->destination_image))) {
                \File::delete(public_path($destinationimage->destination_image));
            }
        }
        destinationImage::destroy($id);

        return redirect('admin/destination/' . $destination_id . '/images');
    }
}
