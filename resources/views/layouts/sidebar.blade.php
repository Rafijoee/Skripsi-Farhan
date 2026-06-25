@extends('layouts.app')

@section('content')
<!-- PENTING: Bungkus dengan flex dan h-screen agar sidebar memanjang penuh ke bawah -->
<div class="flex min-h-screen relative">

    <!-- ASIDE (SIDEBAR) -->
    <aside class="w-72 bg-gradient-to-b from-[#002D72] to-[#001845] text-white flex flex-col justify-between">
        <div>
            <div class="p-6 border-b border-blue-900">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" class="w-12">
                    <div>
                        <h2 class="font-bold text-xl leading-tight">RUDENIM SURABAYA</h2>
                        <p class="text-xs text-blue-200 mt-1">Sistem Pencatatan Pengunjung</p>
                    </div>
                </div>
            </div>

        <nav class="mt-8 px-4">
            {{-- Menu Dashboard --}}
            <a href="{{ route('dashboard') }}" 
            class="flex items-center gap-4 px-5 py-4 rounded-xl mb-3 transition-colors {{ Route::is('dashboard') ? 'bg-blue-700 font-semibold text-white border-l-4 border-blue-500' : 'hover:bg-blue-800 text-blue-100' }}">
            🏠 Dashboard
            </a>

            {{-- Menu Data Pengunjung --}}
            <a href="{{ route('visitors.index') }}" 
            class="flex items-center gap-4 px-5 py-4 rounded-xl mb-3 transition-colors {{ Route::is('visitors.*') ? 'bg-blue-700 font-semibold text-white border-l-4 border-blue-500' : 'hover:bg-blue-800 text-blue-100' }}">
            👥 Data Pengunjung
            </a>

            {{-- Menu Data Detensi --}}
            <a href="{{ route('detensi.index') }}" 
            class="flex items-center gap-4 px-5 py-4 rounded-xl mb-3 transition-colors {{ Route::is('detention.*') ? 'bg-blue-700 font-semibold text-white border-l-4 border-blue-500' : 'hover:bg-blue-800 text-blue-100' }}">
            👤 Data Detensi
            </a>

            {{-- Menu Jadwal Pengunjung --}}
            <a href="{{ route('schedule.index') }}" 
            class="flex items-center gap-4 px-5 py-4 rounded-xl transition-colors {{ Route::is('schedule.*') ? 'bg-blue-700 font-semibold text-white border-l-4 border-blue-500' : 'hover:bg-blue-800 text-blue-100' }}">
            📅 Jadwal Pengunjung
            </a>
        </nav>
        </div>

        <!-- Copyright dipindah ke bawah flex agar tidak menutupi menu -->
        <div class="p-6 text-xs text-blue-200">
            © 2026 Rudenim Surabaya
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <!-- Hapus class p-6 di sini karena halaman dashboard.index Anda sudah memakai class p-8 -->
    <main class="flex-1 bg-gray-50">
        @yield('main-content')
    </main>

</div>
@endsection
