<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_member       = new Role();
        $role_member->name = 'user';
        $role_member->save();
        $role_super_admin       = new Role();
        $role_super_admin->name = 'super admin';
        $role_super_admin->save();
        $role_admin1       = new Role();
        $role_admin1->name = 'admin 1';
        $role_admin1->save();
        $role_admin2       = new Role();
        $role_admin2->name = 'admin 2';
        $role_admin2->save();

        // Role::insert([[
        //     'name' => 'user',
        // ],
        //     [
        //         'name' => 'super admin',
        //     ],
        //     [
        //         'name' => 'admin 1',
        //     ],
        //     [
        //         'name' => 'admin 2',
        //     ]]);
    }
}
