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


        //generate random users
        foreach (range(1, 100) as $index) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = bcrypt('password');
            $user->active = true;
            $user->save();

            //attach random roles
            if (rand(1, 10) == 1)
                $user->attachRole($librarian);
            else
                $user->attachRole($customer);
        }


        //create static users
        DB::table('users')->insert(['name' => $faker->name, 'email' => 'admin@mail.com', 'password' => bcrypt('password'), 'active' => true]);
        DB::table('users')->insert(['name' => $faker->name, 'email' => 'librarian@mail.com', 'password' => bcrypt('password'), 'active' => true]);
        DB::table('users')->insert(['name' => $faker->name, 'email' => 'customer@mail.com', 'password' => bcrypt('password'), 'active' => true]);


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
