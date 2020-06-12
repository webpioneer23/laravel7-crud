<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name'=>'superadmin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('superadmin'),
            'role'=>'superadmin',
        ]);
        User::insert([
            ['name'=>'owner1',
            'email'=>'owner1@gmail.com',
            'password'=>bcrypt('owner1'),
            'role'=>'owner'],

            ['name'=>'owner2',
            'email'=>'owner2@gmail.com',
            'password'=>bcrypt('owner2'),
            'role'=>'owner'],
            
            ['name'=>'owner3',
            'email'=>'owner3@gmail.com',
            'password'=>bcrypt('owner3'),
            'role'=>'owner'],
        ]);
    }
}
