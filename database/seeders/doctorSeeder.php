<?php

namespace Database\Seeders;

use App\Models\doctor;
use App\Models\employee;
use Illuminate\Database\Seeder;

class doctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample doctors with new fields
        doctor::create([
            'name' => 'Dr. Sarah Johnson',
            'specialty' => 'Cardiology',
            'visiting_days' => ['Monday', 'Wednesday', 'Friday'],
            'qualification' => 'MBBS, MD (Cardiology)',
            'phone' => '+880 1234567890',
            'email' => 'sarah.johnson@carebase.com',
            'bio' => 'Experienced cardiologist with over 10 years of practice in treating heart diseases.',
            'is_active' => true,
            'employee_id' => null,
        ]);

        doctor::create([
            'name' => 'Dr. Michael Chen',
            'specialty' => 'Neurology',
            'visiting_days' => ['Tuesday', 'Thursday', 'Saturday'],
            'qualification' => 'MBBS, MD (Neurology)',
            'phone' => '+880 1234567891',
            'email' => 'michael.chen@carebase.com',
            'bio' => 'Specialized in neurological disorders and brain-related conditions.',
            'is_active' => true,
            'employee_id' => null,
        ]);

        doctor::create([
            'name' => 'Dr. Emily Davis',
            'specialty' => 'Pediatrics',
            'visiting_days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday'],
            'qualification' => 'MBBS, MD (Pediatrics)',
            'phone' => '+880 1234567892',
            'email' => 'emily.davis@carebase.com',
            'bio' => 'Dedicated pediatrician with expertise in child healthcare and development.',
            'is_active' => true,
            'employee_id' => null,
        ]);

        doctor::create([
            'name' => 'Dr. Robert Wilson',
            'specialty' => 'Orthopedics',
            'visiting_days' => ['Wednesday', 'Friday', 'Saturday'],
            'qualification' => 'MBBS, MS (Orthopedics)',
            'phone' => '+880 1234567893',
            'email' => 'robert.wilson@carebase.com',
            'bio' => 'Expert in bone and joint disorders, sports injuries, and orthopedic surgery.',
            'is_active' => true,
            'employee_id' => null,
        ]);

        doctor::create([
            'name' => 'Dr. Lisa Anderson',
            'specialty' => 'Dermatology',
            'visiting_days' => ['Monday', 'Thursday', 'Saturday'],
            'qualification' => 'MBBS, MD (Dermatology)',
            'phone' => '+880 1234567894',
            'email' => 'lisa.anderson@carebase.com',
            'bio' => 'Specialized in skin diseases, cosmetic dermatology, and skin cancer treatment.',
            'is_active' => true,
            'employee_id' => null,
        ]);
    }
}
