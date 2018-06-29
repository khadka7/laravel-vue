<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $user = new \App\User();
        $user->name = "Mr. Admin";
        $user->username = "admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('password');
        $user->roles = json_encode(['super_admin']);
        $user->created_at = new DateTime();
        $user->updated_at = new DateTime();
        $user->verified = true;
        $user->save();


    }
}
