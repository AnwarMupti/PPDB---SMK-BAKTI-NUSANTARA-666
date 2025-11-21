<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiayaSeeder extends Seeder
{
    public function run()
    {
        // Get all jurusan
        $jurusan = DB::table('jurusan')->get();
        
        foreach ($jurusan as $j) {
            // Biaya untuk Gelombang 1 - Rp 1.000.000
            DB::table('biaya_pendaftaran')->updateOrInsert(
                [
                    'jurusan_id' => $j->id,
                    'gelombang_id' => 1
                ],
                [
                    'biaya' => 1000000,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
            
            // Biaya untuk Gelombang 2 - Rp 1.200.000
            DB::table('biaya_pendaftaran')->updateOrInsert(
                [
                    'jurusan_id' => $j->id,
                    'gelombang_id' => 2
                ],
                [
                    'biaya' => 1200000,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}