<?php

use App\User;
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
        User::create([
            'name'=> 'Alan Mendoza',
            'email'=> 'turtwig09@hotmail.com',
            'role'=> 'admin',
            'isActive' => 1,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@mock.com',
            'role' => 'user',
            'isActive' => 1,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@mock.com',
            'role' => 'user',
            'isActive' => 1,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jim Doe',
            'email' => 'jim@mock.com',
            'role' => 'user',
            'isActive' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
