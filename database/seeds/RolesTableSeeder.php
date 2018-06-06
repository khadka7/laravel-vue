<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->name = "Super Admin";
        $role->unique_name = "super_admin";
        $role->description = "Super Admin";
        $role->created_at = new DateTime();
        $role->updated_at = new DateTime();
        $role->save();

        $role = new \App\Role();
        $role->name = "Admin";
        $role->unique_name = "admin";
        $role->description = "Admin";
        $role->created_at = new DateTime();
        $role->updated_at = new DateTime();
        $role->save();

        $role = new \App\Role();
        $role->name = "User";
        $role->unique_name = "user";
        $role->description = "User";
        $role->created_at = new DateTime();
        $role->updated_at = new DateTime();
        $role->save();
    }
}
