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
        DB::table('users')->insert([
            'name' => 'Admin',
            'tipo' => 1,
            'email' => 'Admin@email.com',
            'email_verified_at' => date('Y-m-d H:m:s'),
            'password' => Hash::make('12345678'),
            'created_at'=> date('Y-m-d H:m:s'),
        ]);
    }
}
