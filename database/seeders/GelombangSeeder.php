<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GelombangSeeder extends Seeder
{
    public function run()
    {
        // Update or create Gelombang 1
        DB::table('gelombang')->updateOrInsert(
            ['id' => 1],
            [
                'nama' => 'Gelombang 1',
                'tahun' => 2025,
                'tgl_mulai' => '2025-01-01',
                'tgl_selesai' => '2025-05-31',
                'biaya_daftar' => 1000000,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Update or create Gelombang 2
        DB::table('gelombang')->updateOrInsert(
            ['id' => 2],
            [
                'nama' => 'Gelombang 2',
                'tahun' => 2025,
                'tgl_mulai' => '2025-06-01',
                'tgl_selesai' => '2025-12-31',
                'biaya_daftar' => 1200000,
                'aktif' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Update existing pendaftar dates to current date
        DB::table('pendaftar')->update([
            'tanggal_daftar' => now(),
            'updated_at' => now()
        ]);
    }
}