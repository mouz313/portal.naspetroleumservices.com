<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
               'name'=>'User',
               'email'=>'user@naspetroleumservices.com',
               'role'=> 0,
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'Editor',
               'email'=>'manger@naspetroleumservices.com',
               'role'=> 1,
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'Admin',
               'email'=>'Gondalasg@gmail.com',
               'role'=> 2,
               'password'=> bcrypt('Saleh_g11'),
            ],

        ];

        foreach ($users as $key => $user)
        {
            User::create($user);
        }
    }
}
