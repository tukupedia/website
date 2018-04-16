<?php

namespace Tukupedia\Repository\Eloquent;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tukupedia\Repository\Interfaces\AdminRepositoryInterface;

/**
 * User Eloquent Repository
 */
class AdminRepository implements AdminRepositoryInterface
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:6|confirmed',
        ]);
    }

    public function create(array $data)
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
        $member = Role::where('name', 'admin')->first();

        /**
         * Relasikan antara user yang baru saja dibuat dengan role member
         * sehingga user baru statusnya adalah member
         */
        $user->roles()->attach($member);

        DB::commit();

        return $user;
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect('/webmaster');
    }

    public function edit($id, array $data)
    {
        # code...
    }
}
