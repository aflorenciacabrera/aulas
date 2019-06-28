<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //.
        
        // $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_prof = Role::where('name', 'prof')->first();
        $role_bedel = Role::where('name', 'bedel')->first();
        // $user = new User();
        // $user->name = 'User';
        // $user->email = 'user@example.com';
        // $user->password = bcrypt('123456');
        // $user->save();
        // $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Prof';
        $user->email = 'prof@example.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_prof);

        $user = new User();
        $user->name = 'Bedel';
        $user->email = 'bedel@example.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_bedel);
    }
}
