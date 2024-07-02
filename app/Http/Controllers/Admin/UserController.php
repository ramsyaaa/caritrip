<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data['users'] = User::get();
        return view('admin.users.index', $data);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function edit($id){
        $data['user'] = User::findOrFail($id);

        return view('admin.users.edit', $data);
    }

    public function store(Request $request){
        $validate_data = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ];

        $request->validate($validate_data);

        $updated_data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'Admin',
            'password' => bcrypt($request->password)
        ];

        User::create($updated_data);

        alert()->success('Record Created!' );

        return redirect('admin/users');
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $validate_data = [
            'name' => 'required',
        ];

        if($request->password != null){
            $validate_data['password'] = 'required|min:8';
        }

        if($request->email != $user->email){
            $validate_data['email'] = 'required|unique:users';
        }

        $request->validate($validate_data);

        $updated_data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if($request->password != null){
            $updated_data['password'] = bcrypt($request->password);
        }


        User::where(['id' => $id])->update($updated_data);

        alert()->success('Record Updated!' );

        return redirect('admin/users');
    }

}
