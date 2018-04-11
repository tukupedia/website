<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();

        /**
         * Buat data user
         */
        $user = User::create([
            'full_name'    => $data['full_name'],
            'phone_number' => $data['phone_number'],
            'email'        => $data['email'],
            'password'     => bcrypt($data['password']),
        ]);

        /**
         * Ambil role dengan nama member
         */
        $member = Role::where('name', 'member')->first();

        /**
         * Relasikan antara user yang baru saja dibuat dengan role member
         * sehingga user baru statusnya adalah member
         */
        $user->roles()->attach($member);

        DB::commit();

        return $user;
    }
}
