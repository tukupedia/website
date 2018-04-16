<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Handling Admin authentication
 */
class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function authenticated($request, $user)
    {
        if (!$request->user()->is_admin == 1) {
            Auth::logout();
            return redirect('/webmaster/login');
        }
    }

    protected $redirectTo = '/webmaster';

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
}
