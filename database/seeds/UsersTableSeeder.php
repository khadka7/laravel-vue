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
        $user->name = "Kiran Wagle";
        $user->username = "kiran";
        $user->email = "kiran@gmail.com";
        $user->password = Hash::make('password');
        $user->roles = json_encode(['super_admin']);
        $user->created_at = new DateTime();
        $user->updated_at = new DateTime();
        $user->verified = true;
        $user->save();

        //general User
        $user = new \App\User();
        $user->name = "Shrawan";
        $user->username = "admin";
        $user->email = "phuyal@gmail.com";
        $user->password = Hash::make('password');
        $user->roles = json_encode(['admin']);
        $user->created_at = new DateTime();
        $user->updated_at = new DateTime();
        $user->verified = true;
        $user->save();

        //API User
        $user = new \App\User();
        $user->name = "Bishal Pandey";
        $user->username = "pandey";
        $user->email = "pandey21@gmail.com";
        $user->password = Hash::make('password');
        $user->roles = json_encode(['user']);
        $user->created_at = new DateTime();
        $user->updated_at = new DateTime();
        $user->verified = true;
        $user->save();

    }
}
