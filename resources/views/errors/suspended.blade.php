@extends('layouts.app')

@section('title', 'Toko Ditangguhkan')

@section('content')
<div class="w-full max-w-sm animate-fade-up text-center" style="animation-delay: 0.1s;">

    <div class="mb-8 flex justify-center">
        <div class="relative">
            <div class="absolute inset-0 rounded-full animate-pulse opacity-20 bg-google-red" style="animation-duration: 2s;"></div>
            <div class="relative w-24 h-24 rounded-full flex items-center justify-center bg-google-red border-4 border-white shadow-[0_10px_40px_rgba(234,67,53,0.4)]">
                <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="card-solid p-8">
        <h1 class="text-2xl font-bold-display text-google-text mb-2">AKSES DIBLOKIR</h1>
        <p class="text-gray-500 font-bold text-sm mb-6">
            Maaf, layanan untuk kartu ini sedang ditangguhkan sementara oleh administrator.
        </p>
        <p class="text-xs text-gray-400 font-medium">Silakan hubungi pengelola toko untuk informasi lebih lanjut.</p>
    </div>
</div>
@endsection
