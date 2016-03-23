<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //generate random users
        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
            ]);
        }


        //create static users
        DB::table('users')->insert(['name' => $faker->name, 'email' => 'admin@mail.com', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['name' => $faker->name, 'email' => 'librarian@mail.com', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['name' => $faker->name, 'email' => 'customer@mail.com', 'password' => bcrypt('password'),]);


        //define roles
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'System Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $librarian = new Role();
        $librarian->name = 'librarian';
        $librarian->save();

        $customer = new Role();
        $customer->name = 'customer';
        $customer->save();


        //define permissions
        $adminPermission = new Permission();
        $adminPermission->name = 'adminPermission';
        $adminPermission->save();

        $librarianPermission = new Permission();
        $librarianPermission->name = 'librarianPermission';
        $librarianPermission->save();

        $customerPermission = new Permission();
        $customerPermission->name = 'customerPermission';
        $customerPermission->save();


        //assign permissions to the roles
        $admin->attachPermissions([$customerPermission, $librarianPermission, $adminPermission]);
        $librarian->attachPermissions([$customerPermission, $librarianPermission]);
        $customer->attachPermissions([$customerPermission]);


        //assign random roles
        $users = User::all();

        foreach ($users as $user) {
            //approximately one librarian per 10 customers
            if (rand(1, 10) == 1)
                $user->attachRole($librarian);
            else
                $user->attachRole($customer);
        }


        //assign static roles
        $user = User::where('email', '=', 'admin@mail.com')->first();
        $user->detachRoles($user->roles);
        $user->attachRole($admin);

        $user = User::where('email', '=', 'librarian@mail.com')->first();
        $user->detachRoles($user->roles);
        $user->attachRole($librarian);

        $user = User::where('email', '=', 'customer@mail.com')->first();
        $user->detachRoles($user->roles);
        $user->attachRole($customer);
    }
}
