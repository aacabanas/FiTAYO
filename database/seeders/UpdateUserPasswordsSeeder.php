<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->where('username', 'fitayo')->update([
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->where('username', 'aleba678')->update([
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->where('username', 'test123')->update([
            'password' => Hash::make('1234567890'),
        ]);
    }
}