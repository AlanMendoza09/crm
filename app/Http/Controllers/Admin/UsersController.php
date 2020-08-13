<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function index(){
        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|unique:users|email',
            'role' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        $user_password = Hash::make($request->password);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $user_password;

        $user->save();

        return redirect('admin/users')->with('success', 'Successfully Added a User');
    }
}

