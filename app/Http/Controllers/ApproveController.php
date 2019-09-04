<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApproveController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    public function approve($id)
    {
        $user = User::find($id);
        $user->approved = 1;
        $user->save();

        $users = User::all();
        return view('user', compact('users'));
    }
}
