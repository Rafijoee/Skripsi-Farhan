@extends('layouts.sidebar')

@section('title', 'Edit Deteni - Rudenim Surabaya')

@section('main-content')
<header class="bg-white border-b border-gray-100 px-8 py-5 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-[#001845]">Edit Data Deteni</h1>
        <p class="text-xs text-gray-400 mt-0.5">Perbarui informasi deteni dengan benar.</p>
    </div>
    <a href="{{ route('detensi.index') }}" class="flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-gray-700 bg-gray-50 hover:bg-gray-100 px-4 py-2 rounded-xl transition-colors">
        <i class="ri-arrow-left-line"></i> Kembali
    </a>
</header>

<div class="p-8 max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <form action="{{ route('detensi.update', $detensi->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT') {{-- Method PUT wajib digunakan untuk update data --}}

            {{-- Nama Deteni --}}
            <div class="space-y-1.5">
                <label class="text-sm font-semibold text-gray-600">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $detensi->nama) }}" required
                       class="w-full px-4 py-2.5 border @error('nama') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                @error('nama') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
            </div>

            {{-- Negara --}}
            <div class="space-y-1.5">
                <label class="text-sm font-semibold text-gray-600">Negara Asal</label>
                <input type="text" name="negara" value="{{ old('negara', $detensi->negara) }}" required
                       class="w-full px-4 py-2.5 border @error('negara') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                @error('negara') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
            </div>

            {{-- Nomor Paspor --}}
            <div class="space-y-1.5">
                <label class="text-sm font-semibold text-gray-600">No. Paspor</label>
                <input type="text" name="paspor" value="{{ old('paspor', $detensi->paspor) }}" required
                       class="w-full px-4 py-2.5 border font-mono @error('paspor') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                @error('paspor') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Tanggal Masuk --}}
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold text-gray-600">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', \Carbon\Carbon::parse($detensi->tanggal_masuk)->format('Y-m-2D' ? 'Y-m-d' : 'Y-m-d')) }}" required
                           class="w-full px-4 py-2.5 border @error('tanggal_masuk') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                    @error('tanggal_masuk') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Status Dropdown Edit --}}
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold text-gray-600">Status</label>
                    <select name="status" required class="w-full px-4 py-2.5 border @error('status') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="Aktif" {{ old('status', $detensi->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status', $detensi->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('detensi.index') }}" class="px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 bg-gray-50 hover:bg-gray-100 text-center transition-colors">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-sm shadow-blue-100">Perbarui Data</button>
            </div>
        </form>
    </div>
</div>
@endsection