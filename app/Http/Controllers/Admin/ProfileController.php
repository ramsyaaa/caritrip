<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.edit');
    }

    public function store(Request $request){
        $validate_data = [
            'name' => 'required',
        ];

        if($request->password != null){
            $validate_data['password'] = 'required|min:8';
        }

        if($request->email != auth()->user()->email){
            $validate_data['email'] = 'required|email|unique:users';
        }

        $request->validate($validate_data);

        $updated_data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->password != null){
            $updated_data['password'] = bcrypt($request->password);
        }

        User::where([
            'id' => auth()->user()->id,
        ])->update($updated_data);

        alert()->success('Record Updated!' );

        return redirect(route('admin.profile'));
    }
}
