<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAssessmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_assessment')->insert([
            [
                'userAsses_ID' => 1,
                'profile_ID' => 1,
                'height' => 170.00,
                'weight' => 70.00,
                'bmi' => 24.22,
                'bmi_classification' => 'Normal weight',
                'medical_history' => 'None',
                'physically_fit' => 1,
                'operation' => 0,
                'high_blood' => 0,
                'heart_problem' => 0,
                'emergency_contact_name' => 'Maria Santos',
                'emergency_contact_num' => '09123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userAsses_ID' => 2,
                'profile_ID' => 2,
                'height' => 160.00,
                'weight' => 60.00,
                'bmi' => 23.44,
                'bmi_classification' => 'Normal weight',
                'medical_history' => 'Asthma',
                'physically_fit' => 1,
                'operation' => 0,
                'high_blood' => 0,
                'heart_problem' => 0,
                'emergency_contact_name' => 'Juan Dela Cruz',
                'emergency_contact_num' => '09987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userAsses_ID' => 3,
                'profile_ID' => 3,
                'height' => 175.00,
                'weight' => 80.00,
                'bmi' => 26.12,
                'bmi_classification' => 'Overweight',
                'medical_history' => 'Diabetes',
                'physically_fit' => 1,
                'operation' => 0,
                'high_blood' => 1,
                'heart_problem' => 0,
                'emergency_contact_name' => 'Pedro Perez',
                'emergency_contact_num' => '09234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userAsses_ID' => 4,
                'profile_ID' => 4,
                'height' => 165.00,
                'weight' => 55.00,
                'bmi' => 20.20,
                'bmi_classification' => 'Normal weight',
                'medical_history' => 'None',
                'physically_fit' => 1,
                'operation' => 0,
                'high_blood' => 0,
                'heart_problem' => 0,
                'emergency_contact_name' => 'Ana Reyes',
                'emergency_contact_num' => '09876543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
