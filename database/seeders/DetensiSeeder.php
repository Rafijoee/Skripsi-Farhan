<?php

namespace Database\Seeders;

use App\Models\Detensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detensi::create([
            'nama' => 'John Doe',
            'negara' => 'USA',
            'paspor' => 'A1234567',
            'tanggal_masuk' => now(),
            'status' => 'Detained',
        ]);
    }
}
