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
            'is_admin'     => 1,
        ]);

        $role = $data['role'];
        /**
         * Ambil role dengan nama admin
         */
        $admin = Role::where('name', $role)->first();

        /**
         * Relasikan antara user yang baru saja dibuat dengan role admin
         * sehingga user baru statusnya adalah admin
         */
        $user->roles()->attach($admin);

        DB::commit();

        return $user;
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect('/webmaster');
    }

    public function findById($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        /**
         *
         * Update user field
         */
        $user->update($request->all());

        /**
         *
         * Value role didapat dari
         * dropdown pada view
         */
        $role = $request['role'];

        $admin = Role::where('name', $role)->first();

        /**
         *
         * Mengambil nilai dari role semula
         * lalu eksekusi dan menghapus nilai role awal
         */
        $user->roles()->sync($admin);

        return redirect('/webmaster');
    }

}
