<?php

namespace Tukupedia\Repository\Eloquent;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tukupedia\Repository\Interfaces\UserRepositoryInterface;

/**
 * User Eloquent Repository
 */
class UserRepository implements UserRepositoryInterface
{
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
        $member = Role::where('name', 'member')->first();

        /**
         * Relasikan antara user yang baru saja dibuat dengan role member
         * sehingga user baru statusnya adalah member
         */
        $user->roles()->attach($member);

        DB::commit();

        return $user;

    }

    public function edit($id, array $data)
    {
        # code...
    }
}
