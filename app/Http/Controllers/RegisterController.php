<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store()
    {
        $this->validate(request(), [
            'full_name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['full_name', 'phone_number', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/register');
    }
}
