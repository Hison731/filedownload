<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public function index()
    {
        \Session::put('error', 'Arrove required');
        return redirect(route('login'));
    }
}
