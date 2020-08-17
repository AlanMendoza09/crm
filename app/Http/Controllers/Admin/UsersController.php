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

    public function getUser(Request $request, $id){
        $user = User::findOrfail($id);

        return view('admin.user', ['user' => $user]);
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

    public function update(Request $request){

        //Manually check the database to see if there are any emails that it matches in the database other than this users email.

        $request->validate([
            'id' => 'required',
            'name' => 'required|min:6',
            'email' => 'required|email',
            'role' => 'required',
            'isActive' => 'required',
        ]);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->isActive = $request->isActive;

        $user->save();

        return redirect('admin/user/' . $user->id)->with('success', 'Successfully Updated User');
    }
}

