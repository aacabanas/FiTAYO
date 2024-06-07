<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserMembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_membership')->insert([
            [
                'membership_type' => 'Premium',
                'membership_plan' => 'Monthly',
                'membership_desc' => 'Standard monthly membership',
                'start_date' => now(),
                'expiry_date' => now()->addMonth(),
                'next_payment' => now()->addMonth(),
                'payment_status' => 1,
                'Trainer' => 'John Doe',
                'user_id' => 1, // Assuming user ID 1 is new_user
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'membership_type' => 'Premium',
                'membership_plan' => 'Yearly',
                'membership_desc' => 'Premium yearly membership',
                'start_date' => now(),
                'expiry_date' => now()->addYear(),
                'next_payment' => now()->addYear(),
                'payment_status' => 1,
                'Trainer' => 'Jane Doe',
                'user_id' => 2, // Assuming user ID 2 is new_admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}