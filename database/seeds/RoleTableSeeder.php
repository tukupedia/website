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
        $role_member->name = 'member';
        $role_member->save();
        $role_admin       = new Role();
        $role_admin->name = 'admin';
        $role_admin->save();
    }
}
