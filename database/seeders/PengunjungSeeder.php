<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengunjung::create([
            'nama' => 'Jane Smith',
            'nik' => '987654321',
            'telepon' => '08123456789',
            'tanggal_kunjungan' => now(),
            'deteni_id' => 1,
            'status' => 'Pending',
        ]);
    }
}
