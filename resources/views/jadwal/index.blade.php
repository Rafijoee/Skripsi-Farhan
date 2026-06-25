@extends('layouts.sidebar')

@section('title', 'Jadwal Pengunjung - Rudenim Surabaya')

@section('main-content')

{{-- ===== TOPBAR ===== --}}
<header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
            <i class="ri-calendar-event-line text-xl"></i>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-[#001845]">Jadwal Pengunjung</h1>
            <p class="text-xs text-gray-400 mt-0.5">Kelola jadwal kunjungan pengunjung deteni.</p>
        </div>
    </div>
    
    <div class="flex items-center gap-6">
        {{-- Notification --}}
        <div class="relative">
            <button class="relative text-gray-400 hover:text-gray-600 p-1 bg-gray-50 rounded-full w-10 h-10 flex items-center justify-center">
                <i class="ri-notification-3-line text-xl"></i>
                <span class="absolute top-2 right-2 bg-red-500 text-white text-[10px] rounded-full w-4 h-4 flex items-center justify-center font-bold">3</span>
            </button>
        </div>
        {{-- User Profile --}}
        <div class="flex items-center gap-3 cursor-pointer">
            <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                <i class="ri-user-fill text-white text-lg"></i>
            </div>
            <div class="hidden sm:block">
                <p class="text-sm font-bold text-gray-800">Admin Rudenim</p>
                <p class="text-xs text-gray-400 font-medium">Administrator</p>
            </div>
            <i class="ri-arrow-down-s-line text-gray-400 text-lg"></i>
        </div>
    </div>
</header>

{{-- ===== PAGE BODY ===== --}}
<div class="p-8 space-y-6">

    {{-- Filter & Action Top Section --}}
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col xl:flex-row xl:items-center justify-between gap-6">
        
        {{-- Filters (Tanggal, Deteni, Status) --}}
        <form action="" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4 flex-1 max-w-3xl">
            {{-- Filter Tanggal --}}
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-gray-500 tracking-wide">Tanggal</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                        <i class="ri-calendar-line text-gray-400 text-base"></i>
                    </div>
                    <select name="date" class="w-full pl-10 pr-8 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none cursor-pointer font-medium">
                        <option value="2026-06-20">20/06/2026</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </div>
            </div>

            {{-- Filter Deteni --}}
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-gray-500 tracking-wide">Deteni</label>
                <div class="relative">
                    <select name="deteni" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none cursor-pointer font-medium">
                        <option value="">Semua Deteni</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </div>
            </div>

            {{-- Filter Status --}}
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-gray-500 tracking-wide">Status</label>
                <div class="relative">
                    <select name="status" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none cursor-pointer font-medium">
                        <option value="">Semua Status</option>
                        <option value="selesai">Selesai</option>
                        <option value="hadir">Hadir</option>
                        <option value="menunggu">Menunggu</option>
                        <option value="dijadwalkan">Dijadwalkan</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </div>
            </div>
        </form>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap items-center xl:justify-end gap-3 xl:self-end">
            <a href="#" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2.5 rounded-xl text-sm transition-colors shadow-sm w-full sm:w-auto">
                <i class="ri-add-line text-lg"></i>
                Tambah Jadwal
            </a>
            <a href="#" class="flex items-center justify-center gap-2 bg-white hover:bg-green-50 border border-green-200 text-green-600 font-bold px-4 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
                <i class="ri-file-excel-2-line text-lg"></i>
                Export Excel
            </a>
            <a href="#" class="flex items-center justify-center gap-2 bg-white hover:bg-red-50 border border-red-200 text-red-500 font-bold px-4 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
                <i class="ri-file-pdf-line text-lg"></i>
                Export PDF
            </a>
        </div>
    </div>

    {{-- ===== TABLE DATA ===== --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50">
            <h3 class="font-bold text-gray-800 text-base">Daftar Jadwal Kunjungan</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-gray-500 font-semibold">
                        <th class="px-6 py-4 w-16 text-center">No</th>
                        <th class="px-6 py-4">Waktu</th>
                        <th class="px-6 py-4">Deteni</th>
                        <th class="px-6 py-4">Pengunjung</th>
                        <th class="px-6 py-4">Jenis Kunjungan</th>
                        <th class="px-6 py-4">Durasi</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700 font-medium">
                    @forelse($visitors as $index => $item)
                    <tr class="hover:bg-gray-50/40 transition-colors">
                        {{-- No --}}
                        <td class="px-6 py-4 text-center text-gray-400">
                            {{ ($visitors->currentPage() - 1) * $visitors->perPage() + $loop->iteration }}
                        </td>
                        {{-- Waktu --}}
                        <td class="px-6 py-4 font-semibold text-gray-800">
                            <p class="text-gray-800">{{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->addMinutes(30)->format('H:i d M Y') }}</p>
                        </td>
                        {{-- Deteni --}}
                        <td class="px-6 py-4 leading-normal">
                            <div class="text-gray-800 font-semibold">{{ $item->detensi->nama }}</div>
                            <div class="text-xs text-gray-400 font-medium mt-0.5">({{ $item->detensi->negara }})</div>
                        </td>
                        {{-- Pengunjung --}}
                        <td class="px-6 py-4 leading-normal">
                            <div class="text-gray-800 font-semibold">{{ $item->nama }}</div>
                            <div class="text-xs text-gray-400 font-medium mt-0.5">(keluarga)</div>
                        </td>
                        {{-- Jenis Kunjungan --}}
                        <td class="px-6 py-4 text-gray-600">Tatap Muka</td>
                        {{-- Durasi --}}
                        <td class="px-6 py-4 text-gray-600">30 Menit</td>
                        {{-- Status Badge Switch --}}
                        <td class="px-6 py-4">
                            @switch(strtolower($item->status))
                                @case('selesai')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-green-50 text-green-600 border border-green-100">Selesai</span>
                                    @break
                                @case('hadir')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-blue-50 text-blue-600 border border-blue-100">Hadir</span>
                                    @break
                                @case('pending')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-50 text-amber-500 border border-amber-100">Menunggu</span>
                                    @break
                                @case('dijadwalkan')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">Dijadwalkan</span>
                                    @break
                            @endswitch
                        </td>
                        {{-- Aksi --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1.5">
                                <a href="#" title="Detail" class="w-8 h-8 rounded-lg bg-gray-50 border border-gray-100 hover:bg-blue-50 hover:text-blue-600 flex items-center justify-center text-gray-400 transition-colors">
                                    <i class="ri-eye-line text-base"></i>
                                </a>
                                <a href="#" title="Edit" class="w-8 h-8 rounded-lg bg-gray-50 border border-gray-100 hover:bg-amber-50 hover:text-amber-600 flex items-center justify-center text-gray-400 transition-colors">
                                    <i class="ri-pencil-line text-base"></i>
                                </a>
                                <form action="#" method="POST" onsubmit="return confirm('Hapus jadwal ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" title="Hapus" class="w-8 h-8 rounded-lg bg-gray-50 border border-gray-100 hover:bg-red-50 hover:text-red-600 flex items-center justify-center text-gray-400 transition-colors">
                                        <i class="ri-delete-bin-line text-base"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-16 text-center text-gray-400">
                            <i class="ri-calendar-close-line text-4xl block mb-2"></i>
                            Tidak ada jadwal kunjungan ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ===== PAGINATION ===== --}}
        @if($visitors->hasPages())
        <div class="px-6 py-5 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4 bg-white">
            <p class="text-sm text-gray-400 font-medium">
                Menampilkan <span class="text-gray-700 font-semibold">{{ $visitors->firstItem() }}</span> - <span class="text-gray-700 font-semibold">{{ $visitors->lastItem() }}</span> dari <span class="text-gray-700 font-semibold">{{ $visitors->total() }}</span> data
            </p>
            <div class="flex items-center gap-1">
                {{-- Previous --}}
                @if($visitors->onFirstPage())
                    <span class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-100 text-gray-300 cursor-not-allowed"><i class="ri-arrow-left-s-line text-lg"></i></span>
                @else
                    <a href="{{ $visitors->previousPageUrl() }}" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors"><i class="ri-arrow-left-s-line text-lg"></i></a>
                @endif

                {{-- Pages --}}
                @foreach($visitors->getUrlRange(1, $visitors->lastPage()) as $page => $url)
                    @if($page == $visitors->currentPage())
                        <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-600 text-white font-bold text-sm shadow-sm shadow-blue-200">{{ $page }}</span>
                    @elseif($page == 1 || $page == $visitors->lastPage() || abs($page - $visitors->currentPage()) <= 1)
                        <a href="{{ $url }}" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors text-sm font-semibold">{{ $page }}</a>
                    @elseif(abs($page - $visitors->currentPage()) == 2)
                        <span class="w-8 h-8 flex items-center justify-center text-gray-400 text-sm">...</span>
                    @endif
                @endforeach

                {{-- Next --}}
                @if($visitors->hasMorePages())
                    <a href="{{ $visitors->nextPageUrl() }}" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors"><i class="ri-arrow-right-s-line text-lg"></i></a>
                @else
                    <span class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-100 text-gray-300 cursor-not-allowed"><i class="ri-arrow-right-s-line text-lg"></i></span>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection