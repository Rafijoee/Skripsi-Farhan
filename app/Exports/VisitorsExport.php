<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class VisitorsExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected array $filters;
    protected int $rowNumber = 0;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    /**
     * Build the query with all active filters.
     */
    public function query()
    {
        $query = Pengunjung::with('detensi')->latest();

        if (!empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('nama',     'like', "%{$search}%")
                  ->orWhere('nik',    'like', "%{$search}%")
                  ->orWhere('telepon','like', "%{$search}%");
            });
        }

        if (!empty($this->filters['status'])) {
            $query->where('status', $this->filters['status']);
        }

        if (!empty($this->filters['date_from'])) {
            $query->whereDate('jadwal_kunjungan', '>=', $this->filters['date_from']);
        }

        if (!empty($this->filters['date_to'])) {
            $query->whereDate('jadwal_kunjungan', '<=', $this->filters['date_to']);
        }

        return $query;
    }

    /**
     * Column headings row.
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama Pengunjung',
            'NIK / Paspor',
            'Telepon',
            'Deteni',
            'Jadwal Kunjungan',
            'Status',
        ];
    }

    /**
     * Map each row to the export columns.
     */
    public function map($visitor): array
    {
        $this->rowNumber++;

        return [
            $this->rowNumber,
            $visitor->nama,
            $visitor->nik,
            $visitor->telepon,
            $visitor->detensi->nama ?? '-',
            Carbon::parse($visitor->jadwal_kunjungan)->format('d/m/Y H:i'),
            ucfirst($visitor->status),
        ];
    }

    /**
     * Style the header row.
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                'fill'      => ['fillType' => 'solid', 'startColor' => ['argb' => 'FF1D4ED8']],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }
}