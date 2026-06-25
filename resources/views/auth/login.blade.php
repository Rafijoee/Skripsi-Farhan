@extends('layouts.app')
@section('content')
<div class="min-h-screen relative flex items-center justify-center overflow-hidden font-[Inter]">

    <!-- Background -->
    <div class="absolute inset-0">

        <img
            src="{{ asset('images/rudenim.png') }}"
            alt=""
            class="w-full h-full object-cover">

        <div class="absolute inset-0 bg-white/80 backdrop-blur-[2px]"></div>

    </div>

    <!-- Card Login -->
    <div class="relative z-10 w-full max-w-5xl mx-6 py-4">

        <div class="bg-white rounded-3xl overflow-hidden shadow-2xl h-[650px]">
            <div class="grid md:grid-cols-2">

                <!-- Left Side -->
                <div class="bg-gradient-to-br from-[#021E5B] via-[#072B7D] to-[#01143E] text-white p-14 relative">

                    <!-- Logo -->
                    <div class="flex items-center gap-4">

                        <img
                            src="{{ asset('images/logo.png') }}"
                            class="w-16 h-16">

                        <div>

                            <h2 class="font-bold text-2xl">
                                RUDENIM SURABAYA
                            </h2>

                            <p class="text-blue-100">
                                Rumah Detensi Imigrasi Surabaya
                            </p>

                        </div>

                    </div>

                    <!-- Text -->
                    <div class="mt-20">

                        <h1 class="text-5xl font-bold leading-tight">

                            Halaman Login
                            <br>
                            Sistem

                        </h1>

                        <p class="mt-6 text-xl text-blue-100 leading-relaxed">

                            Masukkan kredensial Anda untuk
                            mengakses sistem internal

                        </p>

                    </div>

                    <!-- Icon -->
                    <div class="mt-10 flex justify-center">

                        <div class="relative">

                            <div class="absolute inset-0 bg-blue-500 blur-3xl opacity-50"></div>

                            <i class="ri-lock-2-line text-[140px] relative text-white/90"></i>

                        </div>

                    </div>

                </div>

                <!-- Right Side -->
                <div class="p-16 flex items-center">

                    <div class="w-full">
                        @if (session()->has('error'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 text-center">
                                {{session()->get('error')}}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('authenticate') }}">

                            @csrf

                            <div>

                                <label class="block text-lg font-semibold text-slate-800 mb-3">

                                    Nama Pengguna atau Email

                                </label>

                                <div class="relative">

                                    <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-xl"></i>

                                    <input
                                        type="text"
                                        name="email"
                                        class="w-full h-14 border border-gray-300 rounded-xl pl-12 pr-4 focus:ring-2 focus:ring-blue-600 focus:border-blue-600 outline-none"
                                    >

                                </div>

                            </div>

                            <!-- Password -->
                            <div class="mt-6">

                                <label class="block text-lg font-semibold text-slate-800 mb-3">

                                    Kata Sandi

                                </label>

                                <div class="relative">

                                    <i class="ri-lock-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-xl"></i>

                                    <input
                                        type="password"
                                        name="password"
                                        class="w-full h-14 border border-gray-300 rounded-xl pl-12 pr-4 focus:ring-2 focus:ring-blue-600 focus:border-blue-600 outline-none"
                                    >

                                </div>

                            </div>

                            <!-- Forgot -->
                            <div class="text-right mt-4">

                                <a href="#"
                                   class="text-sky-600 hover:text-sky-700">

                                    Lupa Kata Sandi?

                                </a>

                            </div>

                            <!-- Button -->
                            <button
                                type="submit"
                                class="mt-8 w-full h-14 rounded-xl bg-gradient-to-r from-[#0B3EA9] to-[#0046D5] text-white font-bold text-lg hover:shadow-lg transition">

                                <span class="flex justify-center items-center gap-3">

                                    MASUK

                                    <i class="ri-arrow-right-line text-xl"></i>

                                </span>

                            </button>

                        </form>

                        <!-- Footer -->
                        <div class="mt-8 text-center text-gray-600">

                            RUMAH DETENSI IMIGRASI SURABAYA

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection