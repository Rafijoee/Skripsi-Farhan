@extends('layouts.sidebar')

@section('title','Dashboard')

@section('main-content')

<div class="p-8">

     <div class="flex-1 flex flex-col overflow-hidden">
 
        {{-- Topbar --}}
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-4">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            </div>
            <div class="flex items-center gap-4">
                {{-- User --}}
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-blue-500 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                        </svg>
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-sm font-semibold text-gray-800">Admin Rudenim</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
        </header>
 
        {{-- Scrollable Content Area --}}
        <main class="flex-1 overflow-y-auto p-6 space-y-6">
 
            {{-- ===== STAT CARDS ===== --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
 
                {{-- Card: Total Pengunjung --}}
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Total Pengunjung</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $totalPengunjung }}</p>
                            <p class="text-xs text-gray-400 mt-1">Semua waktu</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                            </svg>
                        </div>
                    </div>
                    {{-- Sparkline (static SVG) --}}
                    <div class="mt-3">
                        <svg viewBox="0 0 80 24" class="w-full h-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="1.5">
                            <polyline points="0,18 15,14 30,16 45,10 60,8 80,4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
 
                {{-- Card: Kunjungan Hari Ini --}}
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Kunjungan Hari Ini</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $pengunjungHariIni }}</p>
                            <p class="text-xs text-gray-400 mt-1">20 Juni 2026</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3">
                        <svg viewBox="0 0 80 24" class="w-full h-6 text-green-400" fill="none" stroke="currentColor" stroke-width="1.5">
                            <polyline points="0,20 15,16 30,12 45,14 60,10 80,6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
 
                {{-- Card: Menunggu Verifikasi --}}
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Menunggu Verifikasi</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $pengunjungmenunggu }}</p>
                            <p class="text-xs text-gray-400 mt-1">Perlu tindakan</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3">
                        <svg viewBox="0 0 80 24" class="w-full h-6 text-orange-400" fill="none" stroke="currentColor" stroke-width="1.5">
                            <polyline points="0,10 15,14 30,8 45,12 60,16 80,10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
 
                {{-- Card: Kunjungan Selesai --}}
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Kunjungan Selesai</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $pengunjungselesai }}</p>
                            <p class="text-xs text-gray-400 mt-1">Hari ini</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3">
                        <svg viewBox="0 0 80 24" class="w-full h-6 text-purple-400" fill="none" stroke="currentColor" stroke-width="1.5">
                            <polyline points="0,16 15,12 30,14 45,8 60,10 80,6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
 
            </div>
 
            {{-- ===== CHART + RECENT VISITS ===== --}}
            <div class="grid grid-cols-1 xl:grid-cols-5 gap-4">
 
                {{-- Bar Chart --}}
                <div class="xl:col-span-3 bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-semibold text-gray-800">Grafik Kunjungan Bulanan</h2>
                        <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>6 Bulan Terakhir</option>
                            <option>12 Bulan Terakhir</option>
                            <option>Tahun Ini</option>
                        </select>
                    </div>
                    {{-- Chart Body --}}
                    <div class="flex items-end gap-3 h-48 pt-4">
                        @php
                            $months = [
                                ['label' => 'Jan', 'value' => 0, 'active' => false],
                                ['label' => 'Feb', 'value' => 0, 'active' => false],
                                ['label' => 'Mar', 'value' => 0, 'active' => false],
                                ['label' => 'Apr', 'value' => 0, 'active' => false],
                                ['label' => 'Mei', 'value' => 0, 'active' => false],
                                ['label' => 'Jun', 'value' => $totalPengunjung, 'active' => true],
                            ];
                            $maxVal = 400;
                        @endphp
                        @foreach($months as $m)
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full rounded-t-md {{ $m['active'] ? 'bg-blue-600' : 'bg-blue-200' }} transition-all duration-300 hover:opacity-80"
                                 style="height: {{ ($m['value'] / $maxVal) * 100 }}%"></div>
                            <span class="text-xs {{ $m['active'] ? 'text-blue-600 font-semibold' : 'text-gray-400' }}">{{ $m['label'] }}</span>
                        </div>
                        @endforeach
                    </div>
                    {{-- Y-axis labels --}}
                    <div class="flex justify-between text-xs text-gray-400 mt-2 px-0">
                        <span>0</span><span>100</span><span>200</span><span>300</span><span>400</span>
                    </div>
                </div>
 
                {{-- Recent Visits Table --}}
                <div class="xl:col-span-2 bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-semibold text-gray-800">Kunjungan Terbaru</h2>
                        <a href="#" class="text-sm text-blue-600 hover:underline font-medium">Lihat Semua</a>
                    </div>
                    <div class="space-y-1">
                        {{-- Table Header --}}
                        <div class="grid grid-cols-4 gap-2 text-xs text-gray-400 font-medium pb-2 border-b border-gray-100">
                            <span class="col-span-1">Nama Pengunjung</span>
                            <span>Deteni</span>
                            <span>Jadwal</span>
                            <span>Status</span>
                        </div>
                        @php
                            $visits = [
                                ['name' => 'Budi Santoso',  'deteni' => 'Ahmad Fauzi', 'date' => '20 Jun 2026', 'time' => '10:00', 'status' => 'Hadir',   'color' => 'green'],
                                ['name' => 'Siti Aisyah',   'deteni' => 'Rizky Adi',   'date' => '20 Jun 2026', 'time' => '11:00', 'status' => 'Pending',  'color' => 'yellow'],
                                ['name' => 'Dewi Lestari',  'deteni' => 'M. Farhan',   'date' => '20 Jun 2026', 'time' => '13:00', 'status' => 'Pending',  'color' => 'yellow'],
                                ['name' => 'Hendra Wijaya', 'deteni' => 'Ali Hakim',   'date' => '20 Jun 2026', 'time' => '14:00', 'status' => 'Hadir',   'color' => 'green'],
                                ['name' => 'Putri Ayu',     'deteni' => 'John Doe',    'date' => '20 Jun 2026', 'time' => '15:00', 'status' => 'Ditolak', 'color' => 'red'],
                            ];
                        @endphp
                        @foreach($kunjunganTerbarus as $visit)
                        <div class="grid grid-cols-4 gap-2 items-center py-2.5 border-b border-gray-50 last:border-0">
                            <div class="flex items-center gap-2 col-span-1 min-w-0">
                                <div class="w-7 h-7 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                    </svg>
                                </div>
                                <span class="text-xs font-medium text-gray-700 truncate">{{ $visit['nama'] }}</span>
                            </div>
                            <span class="text-xs text-gray-600 truncate">{{ $visit->detensi->nama }}</span>
                            <div class="text-xs text-gray-500 leading-tight">
                                <p>{{ $visit['tanggal_kunjungan'] }}</p>
                            </div>
                            <div>
                                @if($visit['status'] === 'Accepted')
                                    <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">{{ $visit['status'] }}</span>
                                @elseif($visit['status'] === 'Pending')
                                    <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">{{ $visit['status'] }}</span>
                                @else
                                    <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">{{ $visit['status'] }}</span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
 
            </div>
 
            {{-- ===== BOTTOM ROW ===== --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
 
                {{-- Donut Chart: Ringkasan Kunjungan --}}
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <h2 class="font-semibold text-gray-800 mb-4">Ringkasan Kunjungan</h2>
                    <div class="flex items-center gap-6">
                        {{-- SVG Donut --}}
                        <div class="relative flex-shrink-0">
                            <svg viewBox="0 0 120 120" class="w-28 h-28 -rotate-90">
                                {{-- Base circle --}}
                                <circle cx="60" cy="60" r="46" fill="none" stroke="#f3f4f6" stroke-width="14"/>
                                {{-- Hadir: 89.6% = ~322 of 360 --}}
                                <circle cx="60" cy="60" r="46" fill="none" stroke="#22c55e" stroke-width="14"
                                        stroke-dasharray="258 290" stroke-dashoffset="0" stroke-linecap="butt"/>
                                {{-- Pending: 6.8% = ~24.5 --}}
                                <circle cx="60" cy="60" r="46" fill="none" stroke="#f59e0b" stroke-width="14"
                                        stroke-dasharray="19 530" stroke-dashoffset="-258" stroke-linecap="butt"/>
                                {{-- Ditolak: 3.6% = ~13 --}}
                                <circle cx="60" cy="60" r="46" fill="none" stroke="#ef4444" stroke-width="14"
                                        stroke-dasharray="10 540" stroke-dashoffset="-277" stroke-linecap="butt"/>
                            </svg>
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-lg font-bold text-gray-800">1.250</span>
                                <span class="text-xs text-gray-400">Total</span>
                            </div>
                        </div>
                        {{-- Legend --}}
                        <div class="space-y-2.5">
                            <div>
                                <div class="flex items-center gap-2 mb-0.5">
                                    <span class="w-2.5 h-2.5 rounded-full bg-green-500 flex-shrink-0"></span>
                                    <span class="text-sm font-medium text-gray-700">Hadir</span>
                                </div>
                                <p class="text-xs text-gray-500 pl-4.5">1.120 (89.6%)</p>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-0.5">
                                    <span class="w-2.5 h-2.5 rounded-full bg-yellow-400 flex-shrink-0"></span>
                                    <span class="text-sm font-medium text-gray-700">Pending</span>
                                </div>
                                <p class="text-xs text-gray-500 pl-4.5">85 (6.8%)</p>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-0.5">
                                    <span class="w-2.5 h-2.5 rounded-full bg-red-500 flex-shrink-0"></span>
                                    <span class="text-sm font-medium text-gray-700">Ditolak</span>
                                </div>
                                <p class="text-xs text-gray-500 pl-4.5">45 (3.6%)</p>
                            </div>
                        </div>
                    </div>
                </div>
 
                {{-- Aktivitas Terbaru --}}
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <h2 class="font-semibold text-gray-800 mb-4">Aktivitas Terbaru</h2>
                    <div class="space-y-3">
                        @php
                            $activities = [
                                ['icon' => 'calendar', 'color' => 'blue',   'text' => 'Pendaftaran baru oleh Budi Santoso', 'time' => '20 Juni 2026, 09:15'],
                                ['icon' => 'user',     'color' => 'purple', 'text' => 'Verifikasi kunjungan Siti Aisyah',    'time' => '20 Juni 2026, 08:50'],
                                ['icon' => 'calendar', 'color' => 'orange', 'text' => 'Jadwal kunjungan baru ditambahkan',   'time' => '20 Juni 2026, 08:30'],
                                ['icon' => 'document', 'color' => 'gray',   'text' => 'Laporan bulanan Mei 2026 dibuat',     'time' => '20 Juni 2026, 07:45'],
                            ];
                        @endphp
                        @foreach($activities as $act)
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0
                                {{ $act['color'] === 'blue'   ? 'bg-blue-100'   : '' }}
                                {{ $act['color'] === 'purple' ? 'bg-purple-100' : '' }}
                                {{ $act['color'] === 'orange' ? 'bg-orange-100' : '' }}
                                {{ $act['color'] === 'gray'   ? 'bg-gray-100'   : '' }}">
                                @if($act['icon'] === 'calendar')
                                <svg class="w-4 h-4 {{ $act['color'] === 'blue' ? 'text-blue-500' : 'text-orange-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                @elseif($act['icon'] === 'user')
                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                @else
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm text-gray-700 leading-tight">{{ $act['text'] }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">{{ $act['time'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
 
                {{-- Pengingat --}}
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex flex-col gap-4">
                    <h2 class="font-semibold text-gray-800">Pengingat</h2>
 
                    {{-- Alert --}}
                    <div class="bg-blue-50 rounded-lg p-4 flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed">
                            Pastikan semua kunjungan diverifikasi sebelum waktu kunjungan berlangsung.
                        </p>
                    </div>
 
                    {{-- Mini Stats --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-blue-50 rounded-lg p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500">Jadwal Hari Ini</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $pengunjungHariIni }}</p>
                            <p class="text-xs text-gray-400">Kunjungan</p>
                        </div>
                        <div class="bg-orange-50 rounded-lg p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500">Perlu Verifikasi</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $pengunjungmenunggu }}</p>
                            <p class="text-xs text-gray-400">Kunjungan</p>
                        </div>
                    </div>
                </div>
 
            </div>
            {{-- /bottom row --}}
 
        </main>
    </div>
    {{-- /main content --}}

@endsection