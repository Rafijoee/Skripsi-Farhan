<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JadwalExport implements FromCollection, WithHeadings, WithMapping
{
    protected $rowNumber = 0;

    /**
    * Ambil semua data dengan relasi detensi
    */
    public function collection()
    {
        return Pengunjung::with('detensi')->get();
    }

    /**
    * Judul Kolom (Header) Excel
    */
    public function headings(): array
    {
        return [
            'No',
            'Waktu',
            'Deteni',
            'Pengunjung',
            'Jenis Kunjungan',
            'Durasi',
            'Status'
        ];
    }

    /**
    * Mapping/Format Isi Data per baris
    */
    public function map($item): array
    {
        $this->rowNumber++;
        
        $waktuAwal = Carbon::parse($item->tanggal_kunjungan)->format('H:i');
        $waktuAkhir = Carbon::parse($item->tanggal_kunjungan)->addMinutes(30)->format('H:i d M Y');

        return [
            $this->rowNumber,
            $waktuAwal . ' - ' . $waktuAkhir,
            $item->detensi->nama . ' (' . $item->detensi->negara . ')',
            $item->nama . ' (keluarga)',
            'Tatap Muka',
            '30 Menit',
            ucfirst($item->status),
        ];
    }
}
