@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="w-full max-w-sm animate-fade-up text-center" style="animation-delay: 0.1s;">

    {{-- Error icon --}}
    <div class="mb-8 flex justify-center">
        <div class="relative">
            {{-- Outer glow ring --}}
            <div class="absolute inset-0 rounded-full animate-pulse opacity-20 bg-google-red" style="animation-duration: 2s;"></div>
            {{-- Icon container --}}
            <div class="relative w-24 h-24 rounded-full flex items-center justify-center bg-google-red border-4 border-white shadow-[0_10px_40px_rgba(234,67,53,0.4)]">
                <span class="text-4xl font-bold-display text-white">404</span>
            </div>
        </div>
    </div>

    {{-- Card --}}
    <div class="card-solid p-8">

        <h1 class="text-2xl font-bold-display text-google-text mb-2">OOPS! TIDAK DITEMUKAN</h1>
        <p class="text-gray-500 font-bold text-sm mb-8">
            Link kartu yang Anda cari tidak ada atau belum terdaftar di sistem kami.
        </p>

        {{-- Action buttons --}}
        <div class="space-y-3">
            <a href="{{ url('/') }}" class="btn-google-blue bg-white !text-google-text hover:bg-gray-50 border-google-text shadow-[4px_4px_0px_#111827]">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                KEMBALI KE BERANDA
            </a>
        </div>
    </div>
</div>
@endsection
