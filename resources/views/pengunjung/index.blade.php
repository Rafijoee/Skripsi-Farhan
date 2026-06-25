@extends('layouts.sidebar')
@section('title', 'Data Pengunjung - Rudenim Surabaya')
@section('main-content')

<div class="p-8 min-h-screen bg-gray-50">

    {{-- Page Header --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Pengunjung</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola dan pantau seluruh data pengunjung</p>
        </div>

        {{-- Admin Info --}}
        <div class="flex items-center gap-4">
            {{-- Notification Bell --}}
            <div class="relative">
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-gray-200 shadow-sm hover:bg-gray-50 transition">
                    <i class="ri-notification-3-line text-gray-600 text-lg"></i>
                </button>
                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">3</span>
            </div>

            {{-- Admin Profile --}}
            <div class="flex items-center gap-3 bg-white border border-gray-200 rounded-xl px-4 py-2 shadow-sm cursor-pointer hover:bg-gray-50 transition">
                <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="ri-user-3-fill text-blue-600 text-lg"></i>
                </div>
                <div class="text-sm leading-tight">
                    <p class="font-semibold text-gray-800">Admin Rudenim</p>
                    <p class="text-gray-400 text-xs">Administrator</p>
                </div>
                <i class="ri-arrow-down-s-line text-gray-400 ml-1"></i>
            </div>
        </div>
    </div>

    {{-- Filter Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 mb-6">
            

        {{-- Filter Row --}}
            <form method="GET" action="{{ route('visitors.index') }}">

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 mb-3">

                    {{-- Search --}}
                    <div class="relative flex-1 max-w-md">

                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <i class="ri-search-line text-gray-400"></i>
                        </div>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama, NIK, atau telepon..."
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">

                    </div>

                    {{-- Status --}}
                    <select
                        name="status"
                        class="px-4 py-2.5 border border-gray-300 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white min-w-[180px]">

                        <option value="">Semua Status</option>

                        <option value="Hadir"
                            {{ request('status') == 'Hadir' ? 'selected' : '' }}>
                            Hadir
                        </option>

                        <option value="Pending"
                            {{ request('status') == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Ditolak"
                            {{ request('status') == 'Ditolak' ? 'selected' : '' }}>
                            Ditolak
                        </option>

                    </select>

                    {{-- Date From --}}
                    <input
                        type="date"
                        name="date_from"
                        value="{{ request('date_from') }}"
                        class="px-4 py-2.5 border border-gray-300 rounded-xl text-sm">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold">

                        <i class="ri-filter-3-line mr-1"></i>
                        Filter

                    </button>


                </div>

            </form>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap items-center gap-3">
            <a
                href="{{ route('visitors.create') }}"
                class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-sm shadow-blue-200"
            >
                <i class="ri-add-line text-base"></i>
                Tambah Pengunjung
            </a>

            <a
                href="{{ route('pengunjung.excel') }}"
                class="flex items-center gap-2 border border-green-500 text-green-600 hover:bg-green-50 px-5 py-2.5 rounded-xl text-sm font-semibold transition"
            >
                <i class="ri-file-excel-2-line text-base text-green-500"></i>
                Download Excel
            </a>

            <a
                href="{{ route('pengunjung.pdf') }}"
                class="flex items-center gap-2 border border-red-400 text-red-500 hover:bg-red-50 px-5 py-2.5 rounded-xl text-sm font-semibold transition"
            >
                <i class="ri-file-pdf-line text-base text-red-400"></i>
                Download PDF
            </a>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50/60">
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wide w-12">No</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Nama Pengunjung</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">NIK / Paspor</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Telepon</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Deteni</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Jadwal Kunjungan</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Status</th>
                        <th class="text-center px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse ($visitors as $index => $visitor)
                    <tr class="hover:bg-blue-50/30 transition-colors group">

                        {{-- No --}}
                        <td class="px-6 py-4 text-gray-400 font-medium">
                            {{ $visitors->firstItem() + $index }}
                        </td>

                        {{-- Nama --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center flex-shrink-0">
                                    <i class="ri-user-3-fill text-blue-500 text-sm"></i>
                                </div>
                                <span class="font-semibold text-gray-800">{{ $visitor->nama }}</span>
                            </div>
                        </td>

                        {{-- NIK --}}
                        <td class="px-6 py-4 text-gray-600 font-mono text-xs tracking-wide">
                            {{ $visitor->nik }}
                        </td>

                        {{-- Telepon --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $visitor->telepon }}
                        </td>

                        {{-- Deteni --}}
                        <td class="px-6 py-4 text-gray-700 font-medium">
                            {{ $visitor->detensi->nama ?? '-' }}
                        </td>

                        {{-- Jadwal Kunjungan --}}
                        <td class="px-6 py-4 text-gray-600">
                            <div class="text-sm">{{ \Carbon\Carbon::parse($visitor->tanggal_kunjungan)->translatedFormat('d M Y') }}</div>
                            <div class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($visitor->tanggal_kunjungan)->format('H:i') }}</div>
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4">
                            @php
                                $statusConfig = [
                                    'hadir'   => ['bg-green-100 text-green-700', 'Hadir'],
                                    'pending' => ['bg-amber-100 text-amber-600', 'Pending'],
                                    'ditolak' => ['bg-red-100 text-red-500',   'Ditolak'],
                                ];
                                $status = strtolower($visitor->status);
                                [$badgeClass, $label] = $statusConfig[$status] ?? ['bg-gray-100 text-gray-500', ucfirst($status)];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $badgeClass }}">
                                {{ $label }}
                            </span>
                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                {{-- View --}}
                                <a
                                    href="{{ route('visitors.show', $visitor->id) }}"
                                    title="Lihat Detail"
                                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 hover:bg-blue-100 text-gray-500 hover:text-blue-600 transition"
                                >
                                    <i class="ri-eye-line text-sm"></i>
                                </a>

                                {{-- Edit --}}
                                <a
                                    href="{{ route('visitors.edit', $visitor->id) }}"
                                    title="Edit"
                                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 hover:bg-amber-100 text-gray-500 hover:text-amber-500 transition"
                                >
                                    <i class="ri-pencil-line text-sm"></i>
                                </a>

                                {{-- Delete --}}
                                <form
                                    action="{{ route('visitors.destroy', $visitor->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data pengunjung ini?')"
                                    class="inline"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        title="Hapus"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 hover:bg-red-100 text-gray-500 hover:text-red-500 transition"
                                    >
                                        <i class="ri-delete-bin-line text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center gap-3 text-gray-400">
                                <i class="ri-user-search-line text-4xl"></i>
                                <p class="text-sm font-medium">Tidak ada data pengunjung ditemukan</p>
                                <p class="text-xs">Coba ubah filter atau tambahkan pengunjung baru</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Footer --}}
        <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-sm text-gray-500">
                Menampilkan
                <span class="font-semibold text-gray-700">{{ $visitors->firstItem() }}</span>
                -
                <span class="font-semibold text-gray-700">{{ $visitors->lastItem() }}</span>
                dari
                <span class="font-semibold text-gray-700">{{ $visitors->total() }}</span>
                data
            </p>

            {{-- Custom Pagination Links --}}
            <div class="flex items-center gap-1">
                {{-- Prev --}}
                @if ($visitors->onFirstPage())
                    <span class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-300 cursor-not-allowed">
                        <i class="ri-arrow-left-s-line"></i>
                    </span>
                @else
                    <a href="{{ $visitors->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 transition">
                        <i class="ri-arrow-left-s-line"></i>
                    </a>
                @endif

                {{-- Page Numbers --}}
                @foreach ($visitors->getUrlRange(1, $visitors->lastPage()) as $page => $url)
                    @if ($page === 1 || $page === $visitors->lastPage() || abs($page - $visitors->currentPage()) <= 1)
                        <a
                            href="{{ $url }}"
                            class="w-9 h-9 flex items-center justify-center rounded-lg text-sm font-medium transition
                                {{ $page === $visitors->currentPage()
                                    ? 'bg-blue-600 text-white shadow-sm shadow-blue-200'
                                    : 'border border-gray-200 text-gray-600 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200' }}"
                        >
                            {{ $page }}
                        </a>
                    @elseif (abs($page - $visitors->currentPage()) === 2)
                        <span class="w-9 h-9 flex items-center justify-center text-gray-400">…</span>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($visitors->hasMorePages())
                    <a href="{{ $visitors->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 transition">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                @else
                    <span class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-300 cursor-not-allowed">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection