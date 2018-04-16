<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * Handling homepage untuk webmaster
 */
class HomeController extends Controller
{

    public function index()
    {
        /**
         *
         * Get all users by Role
         */
        // $admin = User::with('roles')->whereHas('roles', function ($query) {
        //     $query->where('name', 'Admin');
        // })->get();

        $admin = User::where('is_admin', 1)->get();

        return view('admin.home.index', [
            'admin' => $admin,
        ]);
    }
}
