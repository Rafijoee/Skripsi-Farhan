@extends('layouts.sidebar')

@section('title', 'Data Detensi - Rudenim Surabaya')

@section('main-content')

{{-- ===== TOPBAR ===== --}}
<header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Data Detensi</h1>
        <p class="text-sm text-gray-500 mt-0.5">Kelola data deteni yang berada di Rudenim Surabaya.</p>
    </div>
    <div class="flex items-center gap-4">
        {{-- Notification --}}
        <div class="relative">
            <button class="relative text-gray-500 hover:text-gray-700 p-1">
                <i class="ri-notification-3-line text-xl"></i>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center font-bold">3</span>
            </button>
        </div>
        {{-- User --}}
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-blue-500 flex items-center justify-center">
                <i class="ri-user-fill text-white text-lg"></i>
            </div>
            <div class="hidden sm:block">
                <p class="text-sm font-semibold text-gray-800">Admin Rudenim</p>
                <p class="text-xs text-gray-500">Administrator</p>
            </div>
            <i class="ri-arrow-down-s-line text-gray-400"></i>
        </div>
    </div>
</header>

{{-- ===== PAGE BODY ===== --}}
<div class="p-8 space-y-6">

    {{-- Filter & Search Bar --}}
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
        {{-- Search --}}
        <div class="relative flex-1 max-w-md">
            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                <i class="ri-search-line text-gray-400"></i>
            </div>
            <input
                type="text"
                id="searchInput"
                placeholder="Cari nama deteni, negara, atau nomor paspor..."
                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
            >
        </div>

        {{-- Status Filter --}}
        <select
            id="statusFilter"
            class="px-4 py-2.5 border border-gray-300 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white min-w-[160px]"
        >
            <option value="">Semua Status</option>
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
        </select>

        {{-- Spacer --}}
        <div class="flex-1 hidden sm:block"></div>

        {{-- Tambah Button --}}
        <a href="{{ route('detensi.create') }}"
           class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
            <i class="ri-add-line text-lg"></i>
            Tambah Deteni
        </a>
    </div>

    {{-- ===== TABLE ===== --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm " id="detensiTable">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="text-left px-6 py-4 font-semibold text-gray-600 w-16">No</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Nama Deteni</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Negara</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">No. Paspor</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Tanggal Masuk</th>
                        <th class="text-left px-6 py-4 font-semibold text-gray-600">Status</th>
                        <th class="text-center px-6 py-4 font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="tableBody">
                    @forelse($detensi as $index => $item)
                    <tr class="hover:bg-gray-50 transition-colors table-row"
                        data-name="{{ strtolower($item->nama) }}"
                        data-negara="{{ strtolower($item->negara) }}"
                        data-paspor="{{ strtolower($item->paspor) }}"
                        data-status="{{ strtolower($item->status) }}">

                        <td class="px-6 py-4 text-gray-500 font-medium">
                            {{ ($detensi->currentPage() - 1) * $detensi->perPage() + $loop->iteration }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                    <i class="ri-user-fill text-blue-500 text-sm"></i>
                                </div>
                                <span class="font-medium text-gray-800">{{ $item->nama }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-gray-600">{{ $item->negara }}</td>

                        <td class="px-6 py-4 text-gray-600 font-mono">{{ $item->paspor }}</td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            @if(strtolower($item->status) === 'aktif')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700 border border-green-200">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600 border border-gray-200">
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Detail --}}
                                <a href="#"
                                   title="Lihat Detail"
                                   class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-blue-100 flex items-center justify-center text-gray-500 hover:text-blue-600 transition-colors">
                                    <i class="ri-eye-line text-base"></i>
                                </a>
                                {{-- Edit --}}
                                <a href="{{ route('detensi.edit', $item->id) }}"
                                   title="Edit"
                                   class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-yellow-100 flex items-center justify-center text-gray-500 hover:text-yellow-600 transition-colors">
                                    <i class="ri-pencil-line text-base"></i>
                                </a>
                                {{-- Delete --}}
                                <form action="{{ route('detensi.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data deteni ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            title="Hapus"
                                            class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-red-100 flex items-center justify-center text-gray-500 hover:text-red-600 transition-colors">
                                        <i class="ri-delete-bin-line text-base"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center gap-3 text-gray-400">
                                <i class="ri-user-search-line text-4xl"></i>
                                <p class="text-base font-medium">Tidak ada data deteni ditemukan</p>
                                <p class="text-sm">Coba ubah filter atau tambah data baru.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($detensi->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-sm text-gray-500">
                Menampilkan {{ $detensi->firstItem() }}–{{ $detensi->lastItem() }} dari {{ $detensi->total() }} data
            </p>
            <div class="flex items-center gap-1">
                {{-- Previous --}}
                @if($detensi->onFirstPage())
                    <span class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-300 cursor-not-allowed">
                        <i class="ri-arrow-left-s-line text-lg"></i>
                    </span>
                @else
                    <a href="{{ $detensi->previousPageUrl() }}"
                       class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 transition-colors">
                        <i class="ri-arrow-left-s-line text-lg"></i>
                    </a>
                @endif

                {{-- Page Numbers --}}
                @foreach($detensi->getUrlRange(1, $detensi->lastPage()) as $page => $url)
                    @if($page == $detensi->currentPage())
                        <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-600 text-white font-semibold text-sm">
                            {{ $page }}
                        </span>
                    @elseif($page == 1 || $page == $detensi->lastPage() || abs($page - $detensi->currentPage()) <= 1)
                        <a href="{{ $url }}"
                           class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-600 hover:bg-gray-100 transition-colors text-sm">
                            {{ $page }}
                        </a>
                    @elseif(abs($page - $detensi->currentPage()) == 2)
                        <span class="w-9 h-9 flex items-center justify-center text-gray-400 text-sm">…</span>
                    @endif
                @endforeach

                {{-- Next --}}
                @if($detensi->hasMorePages())
                    <a href="{{ $detensi->nextPageUrl() }}"
                       class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 transition-colors">
                        <i class="ri-arrow-right-s-line text-lg"></i>
                    </a>
                @else
                    <span class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-300 cursor-not-allowed">
                        <i class="ri-arrow-right-s-line text-lg"></i>
                    </span>
                @endif
            </div>
        </div>
        @endif
    </div>

</div>

{{-- ===== CLIENT-SIDE SEARCH/FILTER (optional enhancement) ===== --}}
<script>
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const rows = document.querySelectorAll('.table-row');

    function filterTable() {
        const search = searchInput.value.toLowerCase().trim();
        const status = statusFilter.value.toLowerCase().trim();

        rows.forEach(row => {
            const name    = row.dataset.name    || '';
            const negara  = row.dataset.negara  || '';
            const paspor  = row.dataset.paspor  || '';
            const rowStat = row.dataset.status  || '';

            const matchSearch = !search || name.includes(search) || negara.includes(search) || paspor.includes(search);
            const matchStatus = !status || rowStat === status;

            row.style.display = (matchSearch && matchStatus) ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    statusFilter.addEventListener('change', filterTable);
</script>

@endsection