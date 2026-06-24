@extends('layouts.app')

@section('content')

<!-- NAVBAR -->
<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-24">

            <!-- Logo -->
            <div class="flex items-center gap-4">

                <img src="{{ asset('images/logo.jpg') }}"
                    class="w-14 h-14">

                <div>
                    <h1 class="font-bold text-2xl text-slate-900">
                        RUDENIM SURABAYA
                    </h1>

                    <p class="text-gray-500">
                        Rumah Detensi Imigrasi Surabaya
                    </p>
                </div>

            </div>

            <!-- Menu -->
            <div class="hidden lg:flex items-center gap-12">

                <a href="#hero" class="text-blue-700 font-semibold border-b-2 border-blue-700 pb-2">
                    Beranda
                </a>

                <a href="#feature" class="hover:text-blue-700">
                    Informasi
                </a>

                <a href="#flow" class="hover:text-blue-700">
                    Aturan Kunjungan
                </a>

                <a href="#" class="hover:text-blue-700">
                    Tentang Kami
                </a>

                <a href="#" class="hover:text-blue-700">
                    Kontak
                </a>

            </div>

            <!-- Login -->
            <a href="/login"
                class="bg-blue-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-900">

                <i class="fa-solid fa-user mr-2"></i>
                Login Petugas
            </a>

        </div>

    </div>
</nav>

<!-- HERO -->
<section id="hero" class="relative overflow-hidden">

    <div class="grid lg:grid-cols-2 min-h-[650px]">

        <!-- Left -->
        <div class="flex items-center">

            <div class="max-w-xl px-10 lg:px-20">

                <h1 class="text-6xl font-bold leading-tight text-slate-900">

                    Sistem Pencatatan
                    Pengunjung

                    <span class="text-blue-700">
                        RUDENIM
                    </span>

                </h1>

                <p class="mt-8 text-xl text-gray-600 leading-relaxed">

                    Pendaftaran kunjungan deteni kini lebih mudah,
                    terstruktur, dan aman secara online.

                </p>

                <a href="#"
                    class="inline-flex items-center mt-8 bg-blue-700 text-white px-8 py-4 rounded-xl text-xl font-semibold hover:bg-blue-800">

                    <i class="fa-regular fa-calendar mr-3"></i>

                    DAFTAR KUNJUNGAN DISINI

                </a>

                <div class="mt-5 flex items-center gap-2 text-gray-500">

                    <i class="fa-solid fa-shield-halved text-blue-700"></i>

                    <span>
                        Data Anda aman dan terjaga kerahasiaannya
                    </span>

                </div>

            </div>

        </div>

        <!-- Right -->
        <div class="relative">

            <img
                src="{{ asset('images/rudenim.png') }}"
                class="absolute inset-0 w-full h-full object-cover">

            <div
                class="absolute inset-0 bg-gradient-to-r from-white via-white/70 to-transparent">
            </div>

        </div>

    </div>

</section>

<!-- FEATURE -->
<section id="feature" class="max-w-7xl mx-auto px-6 py-12">

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Item -->
        <div class="bg-white border rounded-2xl p-6 shadow-sm">

            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">

                <i class="fa-regular fa-calendar text-3xl text-blue-700"></i>

            </div>

            <h3 class="font-bold text-xl mt-4">
                Jadwal Terstruktur
            </h3>

            <p class="text-gray-500 mt-2">
                Kunjungan terjadwal dengan baik untuk kenyamanan bersama.
            </p>

        </div>

        <div class="bg-white border rounded-2xl p-6 shadow-sm">

            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">

                <i class="fa-solid fa-users text-3xl text-blue-700"></i>

            </div>

            <h3 class="font-bold text-xl mt-4">
                Pembatasan Pengunjung
            </h3>

            <p class="text-gray-500 mt-2">
                Jumlah pengunjung dibatasi sesuai ketentuan yang berlaku.
            </p>

        </div>

        <div class="bg-white border rounded-2xl p-6 shadow-sm">

            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">

                <i class="fa-solid fa-shield-halved text-3xl text-blue-700"></i>

            </div>

            <h3 class="font-bold text-xl mt-4">
                Keamanan Terjamin
            </h3>

            <p class="text-gray-500 mt-2">
                Validasi identitas untuk keamanan dan ketertiban.
            </p>

        </div>

        <div class="bg-white border rounded-2xl p-6 shadow-sm">

            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">

                <i class="fa-regular fa-file-lines text-3xl text-blue-700"></i>

            </div>

            <h3 class="font-bold text-xl mt-4">
                Tercatat & Terlacak
            </h3>

            <p class="text-gray-500 mt-2">
                Riwayat kunjungan terdokumentasi dengan sistem digital.
            </p>

        </div>

    </div>

</section>

<!-- FLOW & RULE -->
<section id="flow" class="max-w-7xl mx-auto px-6 pb-16">

    <div class="grid lg:grid-cols-2 gap-8">

        <!-- Alur -->
        <div class="bg-white rounded-2xl border p-8">

            <h2 class="text-2xl font-bold mb-10">
                Alur Pendaftaran Kunjungan
            </h2>

            <div class="grid grid-cols-3 text-center gap-4">

                <div>

                    <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

                        <i class="fa-regular fa-file-lines text-3xl text-blue-700"></i>

                    </div>

                    <div class="mt-4">

                        <span class="bg-blue-700 text-white px-3 py-1 rounded-full">
                            1
                        </span>

                    </div>

                    <h3 class="font-bold mt-4">
                        Isi Formulir
                    </h3>

                    <p class="text-gray-500 text-sm mt-2">
                        Lengkapi data kunjungan.
                    </p>

                </div>

                <div>

                    <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

                        <i class="fa-solid fa-check text-3xl text-blue-700"></i>

                    </div>

                    <div class="mt-4">

                        <span class="bg-blue-700 text-white px-3 py-1 rounded-full">
                            2
                        </span>

                    </div>

                    <h3 class="font-bold mt-4">
                        Verifikasi Data
                    </h3>

                    <p class="text-gray-500 text-sm mt-2">
                        Data diverifikasi petugas.
                    </p>

                </div>

                <div>

                    <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

                        <i class="fa-solid fa-user-check text-3xl text-blue-700"></i>

                    </div>

                    <div class="mt-4">

                        <span class="bg-blue-700 text-white px-3 py-1 rounded-full">
                            3
                        </span>

                    </div>

                    <h3 class="font-bold mt-4">
                        Datang Sesuai Jadwal
                    </h3>

                    <p class="text-gray-500 text-sm mt-2">
                        Hadir sesuai jadwal yang ditentukan.
                    </p>

                </div>

            </div>

        </div>

        <!-- Aturan -->
        <div class="bg-white rounded-2xl border p-8">

            <h2 class="text-2xl font-bold mb-8">
                Aturan Kunjungan
            </h2>

            <ul class="space-y-5">

                <li class="flex gap-3">
                    <i class="fa-solid fa-circle-check text-blue-700 mt-1"></i>
                    Membawa identitas asli (KTP/Paspor).
                </li>

                <li class="flex gap-3">
                    <i class="fa-solid fa-circle-check text-blue-700 mt-1"></i>
                    Datang 15 menit sebelum jadwal kunjungan.
                </li>

                <li class="flex gap-3">
                    <i class="fa-solid fa-circle-check text-blue-700 mt-1"></i>
                    Maksimal 3 orang pengunjung per deteni.
                </li>

                <li class="flex gap-3">
                    <i class="fa-solid fa-circle-check text-blue-700 mt-1"></i>
                    Pakaian sopan dan tidak mencolok.
                </li>

                <li class="flex gap-3">
                    <i class="fa-solid fa-circle-check text-blue-700 mt-1"></i>
                    Dilarang membawa barang terlarang.
                </li>

            </ul>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-blue-950 text-white">

    <div class="max-w-7xl mx-auto px-6 py-6">

        <div class="flex flex-col lg:flex-row justify-between items-center">

            <div>
                <h3 class="font-bold">
                    RUDENIM SURABAYA
                </h3>

                <p class="text-sm text-blue-200">
                    Rumah Detensi Imigrasi Surabaya
                </p>
            </div>

            <div class="text-center mt-4 lg:mt-0">

                © 2026 Rudenim Surabaya. All rights reserved.

            </div>

            <div class="flex gap-6 mt-4 lg:mt-0">

                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat & Ketentuan</a>
                <a href="#">Bantuan</a>

            </div>

        </div>

    </div>

</footer>

@endsection