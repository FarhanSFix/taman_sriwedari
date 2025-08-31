<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('documents')->insert([
            [
                'nama' => 'Laporan Kegiatan 2025',
                'jenis' => 'LS/TUNAI',
                'bulan_pengesahan' => '2025-01-25',
                'link' => 'uploads/laporan2025.pdf',
                'keterangan' => 'Belum diaudit',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'nama' => 'Evaluasi Proyek Desa',
                'jenis' => 'GU/TUNAI',
                'bulan_pengesahan' => '2025-03-20',
                'link' => 'uploads/evaluasi_desa.pdf',
                'keterangan' => 'Sudah diaudit',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
