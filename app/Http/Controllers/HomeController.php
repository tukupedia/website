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
        $request->user()->authorizeRoles(['user', 'admin']);
        return view('home');
    }

    public function webmasterPage(Request $request)
    {
        // $request->user()->authorizeRoles('admin');
        return view('admin.home');
    }

}
