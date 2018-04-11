<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Handling homepage untuk webmaster
 */
class HomeController extends Controller
{

    public function index()
    {
        return view('admin.home.index');
    }
}
