<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UsersContoller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function addnew(){
        return view('adduser');
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        \Session::put('success', 'User Created.');

        $filepath = "/uploads/".$request['name'];
        if(!file_exists(public_path($filepath))){
            $path = public_path().'/uploads/'.$request['name'];
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        return redirect(route('dashboard'));
    }

    public function edit($id){
        $user = User::find($id);

        return view('edituser', compact('user'));

    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($request['id'])],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request['id'])],
            'password' => ['confirmed'],
        ]);

        $user = User::find($request['id']);

        $old_name = $user->name;

        $filepath = "/uploads/".$old_name;
        $path = public_path().$filepath;

        $user->name = $request['name'];
        $user->email = $request['email'];

        $filepath1 = "/uploads/".$request['name'];
        $path1 = public_path().$filepath1;

        if(isset($request['password'])){
            $user->password = Hash::make($request['password']);
        }

        $user->save();

        if(file_exists(public_path($path))){
            rename($path, $path1);
        }

        return redirect(route('dashboard'));
    }

    public function delete($id)
    {
      // dump($id);
        $user = User::find($id);

        $old_name = $user->name;

        $filepath = "/uploads/".$old_name;
        $path = public_path().$filepath;

        $user->delete();

        rename($path, $path.'(removed)');

        \Session::put('success', 'User Removed.');
        return redirect(route('dashboard'));
    }




}
