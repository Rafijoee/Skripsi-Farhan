<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengunjung = Pengunjung::count();
        $pengunjungHariIni = Pengunjung::whereDate('tanggal_kunjungan', now()->toDateString())->count();
        $pengunjungmenunggu = Pengunjung::where('status', 'Pending')->count();
        $pengunjungselesai = Pengunjung::where('status', 'Selesai')->count();
        $pengunjungDitolak = Pengunjung::where('status', 'Ditolak')->count();

        $kunjunganTerbarus = Pengunjung::orderBy('tanggal_kunjungan', 'desc')->take(5)->with('detensi')->get();
        $ringkasan = [
            'hadir' => $totalPengunjung,
            'pending' => $pengunjungmenunggu,
            'ditolak' => $pengunjungDitolak
            ];

        
        return view('dashboard.index', compact('totalPengunjung', 'pengunjungHariIni', 'pengunjungmenunggu', 'pengunjungselesai', 'pengunjungDitolak', 'kunjunganTerbarus', 'ringkasan'));
    }
}
