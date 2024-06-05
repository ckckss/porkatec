<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('user')
        ]);
        $user->assignRole('usuario');

        $encargado = User::create([
            'name' => 'encargado',
            'email' => 'encargado@mail.com',
            'password' => Hash::make('encargado')
        ]);
        $encargado->assignRole('encargado');


    }
}
