@extends('layouts.app')

@section('content')
<!-- PENTING: Bungkus dengan flex dan h-screen agar sidebar memanjang penuh ke bawah -->
<div class="flex min-h-screen relative">

    <!-- ASIDE (SIDEBAR) -->
    <aside class="w-72 bg-gradient-to-b from-[#002D72] to-[#001845] text-white flex flex-col justify-between">
        <div>
            <div class="p-6 border-b border-blue-900">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.jpg') }}" class="w-12">
                    <div>
                        <h2 class="font-bold text-xl leading-tight">RUDENIM SURABAYA</h2>
                        <p class="text-xs text-blue-200 mt-1">Sistem Pencatatan Pengunjung</p>
                    </div>
                </div>
            </div>

            <nav class="mt-8 px-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl bg-blue-600 mb-3">🏠 Dashboard</a>
                <a href="{{ route('visitors.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-blue-800 mb-3">👥 Data Pengunjung</a>
                <a href="{{ route('detention.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-blue-800 mb-3">👤 Data Detensi</a>
                <a href="{{ route('schedule.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-blue-800">📅 Jadwal Pengunjung</a>
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
