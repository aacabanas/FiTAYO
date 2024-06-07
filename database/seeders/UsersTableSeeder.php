<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'new_user',
                'email' => 'new_user@gmail.com',
                'password' => Hash::make('1234567890'),
                'user_type' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'new_admin',
                'email' => 'new_admin@gmail.com',
                'password' => Hash::make('1234567890'),
                'user_type' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}