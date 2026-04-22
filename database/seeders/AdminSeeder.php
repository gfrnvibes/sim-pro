<?php

namespace Database\Seeders;

use App\Models\HumanResource\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Employee dulu
        $employee = Employee::create([
            'nip' => 'EMP001',
            'name' => 'Super Admin',
            'email' => 'admin@sekolah.test',
            'is_active' => true,
        ]);

        // User login
        $user = User::create([
            'employee_id' => $employee->id,
            'name' => 'Super Admin',
            'email' => 'admin@sekolah.test',
            'password' => Hash::make('password'),
        ]);

        // Assign role
        $user->assignRole('Super Admin');
    }
}
