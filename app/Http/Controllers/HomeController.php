<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['employee', 'manager']);
        return view('home');
    }

    // public function someAdminStuff(Request $request)
    // {
    //     $request->user()->authorizeRoles('manager');
    //     return view('some.view');
    // }

}
