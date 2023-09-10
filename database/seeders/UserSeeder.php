<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->truncate();
        //seeder de usuarios, son datos precargados para la tabla usuarios
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'tipo' => 1,
                'email' => 'Admin@gmail.com',
                // 'email_verified_at' => date('Y-m-d H:m:s'),
                'password' => Hash::make('12345678'),
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'name' => 'Javier Villagran Placencio',
                'tipo' => 2,
                'email' => 'javier@gmail.com',
                // 'email_verified_at' => date('Y-m-d H:m:s'),
                'password' => Hash::make('12345678'),
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'name' => 'Kenia Sasha Rojas Arroyo',
                'tipo' => 2,
                'email' => 'sasha@gmail.com',
                // 'email_verified_at' => date('Y-m-d H:m:s'),
                'password' => Hash::make('12345678'),
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'name' => 'Ezquiel Tonatiuh',
                'tipo' => 2,
                'email' => 'cheque@gmail.com',
                // 'email_verified_at' => date('Y-m-d H:m:s'),
                'password' => Hash::make('12345678'),
                'created_at'=> date('Y-m-d H:m:s'),
            ]
        ]);
    }
}
