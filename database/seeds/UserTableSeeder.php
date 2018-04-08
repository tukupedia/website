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
        $role_member          = Role::where('name', 'member')->first();
        $role_admin           = Role::where('name', 'admin')->first();
        $member               = new User();
        $member->full_name    = 'Member Name';
        $member->phone_number = '08123456789';
        $member->email        = 'member@example.com';
        $member->password     = bcrypt('secret');
        $member->save();
        $member->roles()->attach($role_member);
        $admin               = new User();
        $admin->full_name    = 'Admin Name';
        $admin->phone_number = '08123456789';
        $admin->email        = 'admin@example.com';
        $admin->password     = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
