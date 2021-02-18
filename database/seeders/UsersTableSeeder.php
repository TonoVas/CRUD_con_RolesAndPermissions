<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuario es el rol usuario

        $user = User::create([
            'name'=>'usuario',
            'email'=>'2@gmail.com',
            'password'=>bcrypt('123456789'),
            'estado'=> 1
        ]);
        $user->assignRole('usuario');

        //usuario es el rol super-admin
        $admin = User::create([
            'name'=>'admin',
            'email'=>'1@gmail.com',
            'password'=>bcrypt('123456789'),
            'estado'=> 1
        ]);
        $admin->assignRole('super-admin');
    }
}
