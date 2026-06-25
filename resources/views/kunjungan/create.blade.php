@extends('layouts.app')

@section('title', 'Tambah Pengunjung - Rudenim Surabaya')

@section('content')
<header class="bg-white border-b border-gray-100 px-8 py-5 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-[#001845]">Tambah Kunjungan Baru</h1>
        <p class="text-xs text-gray-400 mt-0.5">Pencatatan data masyarakat yang berkunjung ke Rudenim.</p>
    </div>
    <a href="{{ route('landing-page') }}" class="flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-gray-700 bg-gray-50 hover:bg-gray-100 px-4 py-2 rounded-xl transition-colors">
        <i class="ri-arrow-left-line"></i> Kembali
    </a>
</header>

<div class="p-8 max-w-2xl">
    @if ($errors->any())
        <div class="bg-yellow-100 p-4 mb-4 rounded-xl">
            <p class="font-bold">Daftar Error yang Diterima:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <form action="{{ route('visitors.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nama Pengunjung --}}
            <div class="space-y-1.5">
                <label class="text-sm font-semibold text-gray-600">Nama Pengunjung</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap pengunjung"
                       class="w-full px-4 py-2.5 border @error('nama') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                @error('nama') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- NIK --}}
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold text-gray-600">NIK (KTP)</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" required placeholder="Masukkan 16 digit NIK" maxlength="16"
                           class="w-full px-4 py-2.5 border font-mono @error('nik') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                    @error('nik') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Telepon --}}
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold text-gray-600">No. Telepon / WhatsApp</label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}" required placeholder="Contoh: 08123456xxx"
                           class="w-full px-4 py-2.5 border @error('telepon') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                    @error('telepon') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Pilih Deteni yang dikunjungi --}}
            <div class="space-y-1.5">
                <label class="text-sm font-semibold text-gray-600">Deteni yang Dikunjungi</label>
                <select name="deteni_id" required class="w-full px-4 py-2.5 border @error('deteni_id') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="" disabled selected>-- Pilih Deteni --</option>
                    @foreach($detensi as $deteni)
                        <option value="{{ $deteni->id }}" {{ old('deteni_id') == $deteni->id ? 'selected' : '' }}>
                            {{ $deteni->nama }} ({{ $deteni->negara }})
                        </option>
                    @endforeach
                </select>
                @error('deteni_id') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Tanggal & Jam Kunjungan --}}
                <div class="space-y-1.5">
                    <label class="text-sm font-semibold text-gray-600">Waktu Kunjungan</label>
                    <input type="datetime-local" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}" required
                           class="w-full px-4 py-2.5 border @error('tanggal_kunjungan') border-red-400 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                    @error('tanggal_kunjungan') <p class="text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>


            </div>

            {{-- Buttons --}}
            <div class="pt-4 flex justify-end gap-3">
                <button type="reset" class="px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 bg-gray-50 hover:bg-gray-100 transition-colors">Reset</button>
                <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-sm shadow-blue-100">Simpan Pengunjung</button>
            </div>
        </form>
    </div>
</div>
@endsection