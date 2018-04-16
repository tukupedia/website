<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user  = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'super admin')->first();

        $user               = new User();
        $user->full_name    = 'User Name';
        $user->phone_number = '08123456789';
        $user->email        = 'user@example.com';
        $user->password     = bcrypt('secret');
        $user->is_admin     = 0;
        $user->save();
        $user->roles()->attach($role_user);

        $admin               = new User();
        $admin->full_name    = 'Admin Name';
        $admin->phone_number = '08123456789';
        $admin->email        = 'admin@example.com';
        $admin->password     = bcrypt('secret');
        $admin->is_admin     = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
