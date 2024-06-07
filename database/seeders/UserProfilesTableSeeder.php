<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_profile')->insert([
            [
                'profile_ID' => 1,
                'firstName' => 'Raul',
                'lastName' => 'Miguel',
                'profileBio' => 'Fitness enthusiast from the Philippines.',
                'contact_prefix' => '+63',
                'contactDetails' => '9123456789',
                'birthdate' => '1990-01-01',
                'age' => 34,
                'address_street_num' => '123',
                'address_barangay' => 'Barangay Uno',
                'address_city' => 'Quezon City',
                'address_region' => 'NCR',
                'created_at' => now(),
                'updated_at' => now(),
                'user_ID' => 1,
                'userMem_ID' => 1,
            ],
            [
                'profile_ID' => 2,
                'firstName' => 'Juan',
                'lastName' => 'Dela Cruz',
                'profileBio' => 'Admin of the fitness center.',
                'contact_prefix' => '+63',
                'contactDetails' => '9987654321',
                'birthdate' => '1985-05-05',
                'age' => 39,
                'address_street_num' => '456',
                'address_barangay' => 'Barangay Dos',
                'address_city' => 'Makati City',
                'address_region' => 'NCR',
                'created_at' => now(),
                'updated_at' => now(),
                'user_ID' => 2,
                'userMem_ID' => 2,
            ],
            [
                'profile_ID' => 3,
                'firstName' => 'Pedro',
                'lastName' => 'Perez',
                'profileBio' => 'Fitness trainer with diabetes.',
                'contact_prefix' => '+63',
                'contactDetails' => '9234567890',
                'birthdate' => '1980-10-10',
                'age' => 43,
                'address_street_num' => '789',
                'address_barangay' => 'Barangay Tres',
                'address_city' => 'Pasig City',
                'address_region' => 'NCR',
                'created_at' => now(),
                'updated_at' => now(),
                'user_ID' => 3,
                'userMem_ID' => 3,
            ],
            [
                'profile_ID' => 4,
                'firstName' => 'Ana',
                'lastName' => 'Reyes',
                'profileBio' => 'New member of the fitness center.',
                'contact_prefix' => '+63',
                'contactDetails' => '9876543210',
                'birthdate' => '1995-03-15',
                'age' => 29,
                'address_street_num' => '101',
                'address_barangay' => 'Barangay Quatro',
                'address_city' => 'Manila City',
                'address_region' => 'NCR',
                'created_at' => now(),
                'updated_at' => now(),
                'user_ID' => 4,
                'userMem_ID' => 4,
            ],
        ]);
    }
}