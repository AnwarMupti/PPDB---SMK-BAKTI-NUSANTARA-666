<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => 'mradmin@gmail.com'],
            [
                'name' => 'Administrator',
                'phone' => '081234567890',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create Kepsek User
        User::updateOrCreate(
            ['email' => 'mrkepsek@gmail.com'],
            [
                'name' => 'Kepala Sekolah',
                'phone' => '081234567891',
                'password' => Hash::make('kepsek123'),
                'role' => 'kepsek',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create Keuangan User
        User::updateOrCreate(
            ['email' => 'mskeuangan@gmail.com'],
            [
                'name' => 'Staff Keuangan',
                'phone' => '081234567892',
                'password' => Hash::make('keuangan123'),
                'role' => 'keuangan',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create Verifikator User
        User::updateOrCreate(
            ['email' => 'mrverifikator@gmail.com'],
            [
                'name' => 'Verifikator Administrasi',
                'phone' => '081234567893',
                'password' => Hash::make('verifikator123'),
                'role' => 'verifikator_adm',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}