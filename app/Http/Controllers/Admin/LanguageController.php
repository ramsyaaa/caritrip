<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
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
    public function index(Request $request, $lang)
    {
        $perPage = 25;
        $language = Language::latest()->paginate($perPage);
        $data['language'] = $language;
        $data['language_default'] = $lang;
        return view('admin.language.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($lang)
    {
        $data['language_default'] = $lang;
        return view('admin.language.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $lang)
    {
        $request->validate([
            'language_name' => 'required|string|unique:languages',
            'language_code' => 'required|string|unique:languages',
            'is_default' => 'required',
            'is_active' => 'required'
        ]);

        if($request->is_active && $request->is_default){
            Language::where([
                'is_active' => true,
                'is_default' => true,
            ])->update([
                'is_default' => false,
            ]);
        }

        $is_default = $request->is_default;
        if($request->is_active == false && $request->is_default){
            $is_default = false;
        }

        Language::create([
            'language_name' => $request->language_name,
            'language_code' => strtolower($request->language_code),
            'is_default' => $is_default,
            'is_active' => $request->is_active
        ]);
        alert()->success('New ' . 'Language'. ' Created!' );

        return redirect($lang . '/admin/language');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($lang, $id)
    {
        $data['language'] = Language::findOrFail($id);
        $data['language_default'] = $lang;

        return view('admin.language.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($lang, $id)
    {
        $language = Language::findOrFail($id);
        $data['language'] = $language;
        $data['language_default'] = $lang;
        return view('admin.language.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $lang, $id)
    {
        $language = Language::findOrFail($id);

        $language_name = 'required|string|unique:languages';
        if($language->language_name == $request->language_name){
            $language_name = 'required|string';
        }
        $language_code = 'required|string|unique:languages';
        if($language->language_code == $request->language_code){
            $language_code = 'required|string';
        }

        $request->validate([
            'language_name' => $language_name,
            'language_code' => $language_code,
            'is_default' => 'required',
            'is_active' => 'required'
        ]);

        if($request->is_active && $request->is_default){
            Language::where([
                'is_active' => true,
                'is_default' => true,
            ])->update([
                'is_default' => false,
            ]);

            Language::where('id', $id)->update([
                'language_name' => $request->language_name,
                'language_code' => strtolower($request->language_code),
                'is_default' => $request->is_default,
                'is_active' => $request->is_active
            ]);
        }else{
            $is_default = $request->is_default;
            $is_active = $request->is_active;
            if($request->is_active == false && $request->is_default){
                $is_default = false;
            }

            Language::where('id', $id)->update([
                'language_name' => $request->language_name,
                'language_code' => strtolower($request->language_code),
                'is_default' => $is_default,
                'is_active' => $is_active
            ]);

            $checkLang = Language::where([
                'is_active' => true,
                'is_default' => true,
            ])->first();

            if($checkLang == null){
                $checkLang = Language::where([
                    'is_active' => true,
                ])->latest()->first()->update([
                    'is_default' => true,
                ]);
            }
        }

        alert()->success('Record Updated!' );

        return redirect($lang . '/admin/language');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($lang, $id)
    {
        alert()->success('Record Deleted!' );
        Language::destroy($id);

        return redirect($lang . '/admin/language');
    }
}
