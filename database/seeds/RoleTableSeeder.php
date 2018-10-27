<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superuser = new Role();
        $role_superuser->name = 'superuser';
        $role_superuser->description = 'Admin tertinggi';
        $role_superuser->save();

        $role_staff = new Role();
        $role_staff->name = 'staff';
        $role_staff->description = 'Admin biasa';
        $role_staff->save();
    }
}
