<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BoatCabinController extends Controller
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
        $cabins = Cabin::where('boat_id', $id)->latest()->paginate($perPage);
        $data['cabins'] = $cabins;
        return view('admin.boat-cabin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $data['boat_id'] = $id;
        return view('admin.boat-cabin.create', $data);
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
            'name' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['boat_id'] = $id;
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                // Kompres gambar
                $imageResized = Image::make($image)->resize(1440, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/' . $filename), 75);

                $requestData['image'] = 'uploads/' . $filename;
        }

        Cabin::create($requestData);
        alert()->success('New ' . 'Image'. ' Created!' );

        return redirect('admin/boat/' . $id . '/cabins');
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
        $data['cabin'] = Cabin::findOrFail($id);
        $data['boat_id'] = $boat_id;

        return view('admin.boat-cabin.show', $data);
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
        $cabin = Cabin::findOrFail($id);
        $data['cabin'] = $cabin;
        $data['boat_id'] = $boat_id;
        return view('admin.boat-cabin.edit', $data);
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
            'name' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
        ]);

        $requestData = $request->all();
        $cabin = Cabin::findOrFail($id);

        if ($request->hasFile('image')) {
            if (\File::exists(public_path($cabin->image))) {
                \File::delete(public_path($cabin->image));
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
        $cabin->update($requestData);

        return redirect('admin/boat/' . $boat_id . '/cabins');
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
        $cabin = Cabin::findOrFail($id);
        if ($cabin->image) {
            if (\File::exists(public_path($cabin->image))) {
                \File::delete(public_path($cabin->image));
            }
        }
        Cabin::destroy($id);

        return redirect('admin/boat/' . $boat_id . '/cabins');
    }
}
