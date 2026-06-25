<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use App\Models\Detensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

// For Excel & PDF export
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VisitorsExport;

class PengunjungController extends Controller
{
    /**
     * Display a listing of Pengunjungs with search & filter.
     */
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

    return view('pengunjung.index', compact('visitors'));

}

    /**
     * Show the form for creating a new Pengunjung.
     */
public function create()
    {
        $detensi = Detensi::where('status', 'Aktif')->get();
        return view('pengunjung.create', compact('detensi'));
    }

    /**
     * Store a newly created Pengunjung in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'              => 'required|string|max:255',
            'nik'               => 'required|string|max:16',
            'telepon'           => 'required|string|max:15',
            'tanggal_kunjungan' => 'required|date_format:Y-m-d\TH:i', // Format datetime-local
            'deteni_id'         => 'required|exists:detensis,id',
            'status'            => 'required|in:Pending,Diterima,Ditolak',
        ]);

        Pengunjung::create($validated);

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Data pengunjung berhasil ditambahkan.');
    }

    /**
     * Display the specified Pengunjung.
     */

    /**
     * Show the form for editing the specified Pengunjung.
     */
    public function edit($id)
        {
            $pengunjung = Pengunjung::findOrFail($id);
            $detensi = Detensi::all(); // Mengambil semua data deteni untuk opsi edit
            
            return view('pengunjung.edit', compact('pengunjung', 'detensi'));
        }

    /**
     * Update the specified Pengunjung in storage.
     */
    public function update(Request $request, Pengunjung $Pengunjung)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:255',
            'nik'              => 'required|string|max:20|unique:pengunjungs,nik,' . $Pengunjung->id,
            'telepon'          => 'required|string|max:20',
            'deteni_id'        => 'required|exists:detensis,id',
            'jadwal_kunjungan' => 'required|date',
            'status'           => 'required|in:Hadir,Pending,Ditolak',
            'catatan'          => 'nullable|string',
        ]);

        $Pengunjung->update($validated);

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Data pengunjung berhasil diperbarui.');
    }

    /**
     * Remove the specified Pengunjung from storage.
     */
    public function destroy(Pengunjung $Pengunjung)
    {
        $Pengunjung->delete();

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Data pengunjung berhasil dihapus.');
    }

    // =========================================================
    //  EXPORTS
    // =========================================================

    /**
     * Export Pengunjungs to Excel (.xlsx)
     * Uses: maatwebsite/excel  →  composer require maatwebsite/excel
     */
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

        $pdf = Pdf::loadView('pengunjung.exports', compact('Pengunjungs'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('data-pengunjung-' . now()->format('Ymd') . '.pdf');
    }
}