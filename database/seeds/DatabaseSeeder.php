<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create users
        DB::table('users')->insert(['name' => 'marek', 'email' => 'admin@mail.com', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['name' => 'marek', 'email' => 'librarian@mail.com', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['name' => 'marek', 'email' => 'customer@mail.com', 'password' => bcrypt('password'),]);


        //define roles
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'System Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $librarian = new Role();
        $librarian->name = 'librarian';

        $customer = new Role();
        $customer->name = 'customer';


        //assign roles
        User::where('email', '=', 'admin@mail.com')->first()->attachRole($admin);
        User::where('email', '=', 'librarian@mail.com')->first()->attachRole($librarian);
        User::where('email', '=', 'customer@mail.com')->first()->attachRole($customer);
    }
}
