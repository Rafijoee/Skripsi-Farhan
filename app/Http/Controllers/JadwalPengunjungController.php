<?php

namespace App\Http\Controllers;

use App\Exports\JadwalExport;
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

public function exportExcel()
    {
        dd('Export Excel');
        return Excel::download(new JadwalExport, 'laporan-jadwal-' . date('Y-m-d') . '.xlsx');
    }

    /**
     * Download PDF
     */
    public function exportPdf()
    {
        // Ambil data semua tanpa pagination untuk dicetak ke PDF
        $visitors = Pengunjung::with('detensi')->latest()->get();
        
        // Memuat view blade khusus cetak PDF dengan kertas A4 Landscape
        $pdf = Pdf::loadView('jadwal.pdf', compact('visitors'))->setPaper('a4', 'landscape');
        
        return $pdf->download('laporan-jadwal-' . date('Y-m-d') . '.pdf');
    }
}
