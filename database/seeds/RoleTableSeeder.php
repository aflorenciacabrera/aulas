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
        //

        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        // $role = new Role();
        // $role->name = 'user';
        // $role->description = 'User';
        // $role->save();

        $role = new Role();
        $role->name = 'prof';
        $role->description = 'Profesor';
        $role->save();

        $role = new Role();
        $role->name = 'bedel';
        $role->description = 'Bedelia';
        $role->save();
    }
}
