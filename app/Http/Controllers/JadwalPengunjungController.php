<?php

namespace App\Http\Controllers;

use App\Exports\VisitorsExport;
use App\Models\Detensi;
use App\Models\Pengunjung;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JadwalPengunjungController extends Controller
{
    public function index(Request $request)
    {
            $query = Pengunjung::with('detensi')->latest();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%")
              ->orWhere('nik', 'like', "%{$search}%")
              ->orWhere('telepon', 'like', "%{$search}%");
        });
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $visitors = $query->paginate(5);

    return view('jadwal.index', compact('visitors'));
    }

        public function exportExcel(Request $request)
    {
        return Excel::download(
            new VisitorsExport($request->all()),
            'data-pengunjung-' . now()->format('Ymd') . '.xlsx'
        );
    }

    /**
     * Export Pengunjungs to PDF
     * Uses: barryvdh/laravel-dompdf  →  composer require barryvdh/laravel-dompdf
     */
    public function exportPdf(Request $request)
    {
        $query = Pengunjung::with('detensi')->latest();

        // Apply the same filters so exported data matches the current view
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama',    'like', "%{$search}%")
                  ->orWhere('nik',   'like', "%{$search}%")
                  ->orWhere('telepon','like', "%{$search}%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('jadwal_kunjungan', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('jadwal_kunjungan', '<=', $request->date_to);
        }

        $Pengunjungs = $query->get();

        $pdf = Pdf::loadView('jadwal.exports', compact('Pengunjungs'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('data-jadwal-' . now()->format('Ymd') . '.pdf');
    }
}
