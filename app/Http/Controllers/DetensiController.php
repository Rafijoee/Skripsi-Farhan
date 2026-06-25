<?php

namespace App\Http\Controllers;

use App\Models\Detensi;
use Illuminate\Http\Request;

class DetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
    {
        // 1. Ambil input query pencarian dan status dari request (untuk backend-filter jika dibutuhkan)
        $search = $request->input('search');
        $status = $request->input('status');

        // 2. Query dasar dari model Detensi
        $query = Detensi::query();

        // 3. Tambahkan logika pencarian (opsional, mengantisipasi jika filter JS beralih ke server-side)
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('negara', 'like', "%{$search}%")
                  ->orWhere('paspor', 'like', "%{$search}%"); // Berdasarkan dd Anda: 'paspor', di view Anda: 'no_paspor'
            });
        }
        if ($status) {
            $query->where('status', $status);
        }

        // 4. Ambil data dengan Pagination (Misal: 10 data per halaman)
        // Gunakan latest() agar data terbaru masuk/terbuat muncul paling atas
        $detensi = $query->latest()->paginate(10)->withQueryString();
        

        // 5. Lempar data ke view blade Anda (sesuaikan dengan lokasi file blade Anda)
        return view('detensi.index', compact('detensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'negara'        => 'required|string|max:100',
            'paspor'        => 'required|string|max:50|unique:detensis,paspor',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|in:Aktif,Nonaktif', // Validasi enum dropdown
        ]);

        Detensi::create($validated);

        return redirect()->route('detensi.index')->with('success', 'Data deteni berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Detensi $detensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
    {
        $detensi = Detensi::findOrFail($id);
        return view('detensi.edit', compact('detensi'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
    {
        $detensi = Detensi::findOrFail($id);

        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'negara'        => 'required|string|max:100',
            'paspor'        => 'required|string|max:50|unique:detensis,paspor,' . $detensi->id,
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|in:Aktif,Nonaktif',
        ]);

        $detensi->update($validated);

        return redirect()->route('detensi.index')->with('success', 'Data deteni berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
        {
            $detensi = Detensi::findOrFail($id);
            $detensi->delete();

            return redirect()->back()->with('success', 'Data deteni berhasil dihapus.');
    }
}
