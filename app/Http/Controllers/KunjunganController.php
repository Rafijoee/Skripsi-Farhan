<?php

namespace App\Http\Controllers;

use App\Models\Detensi;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function create()
    {
        $detensi = Detensi::where('status', 'Aktif')->get();
        return view('kunjungan.create', compact('detensi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'telepon' => 'required|string|max:15',
            'tanggal_kunjungan' => 'required|date_format:Y-m-d\TH:i',
            'deteni_id' => 'required|exists:detensis,id',
        
             // Format datetime-local
        ]);
        $status = 'Pending'; // Set the default status to "Pending"
        $validated['status'] = $status;
        dd($validated);
        $nama = Detensi::find($validated['deteni_id'])->nama;

        Pengunjung::create($validated);


        return redirect()->route('landing-page')->with('success', 'Kamu berhasil mendaftar kunjungan ke ' . $nama . '.');
    }
}
