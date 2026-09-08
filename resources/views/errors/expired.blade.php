@extends('layouts.app')

@section('title', 'Masa Berlaku Habis')

@section('content')
<div class="w-full max-w-sm animate-fade-up text-center" style="animation-delay: 0.1s;">

    <div class="mb-8 flex justify-center">
        <div class="relative">
            <div class="absolute inset-0 rounded-full animate-pulse opacity-20 bg-google-yellow" style="animation-duration: 2s;"></div>
            <div class="relative w-24 h-24 rounded-full flex items-center justify-center bg-google-yellow border-4 border-white shadow-[0_10px_40px_rgba(251,188,5,0.4)]">
                <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="card-solid p-8">
        <h1 class="text-2xl font-bold-display text-google-text mb-2">KEDALUWARSA</h1>
        <p class="text-gray-500 font-bold text-sm mb-6">
            Masa berlaku layanan untuk kartu ini telah habis.
        </p>
        <p class="text-xs text-gray-400 font-medium">Silakan hubungi administrator untuk memperpanjang masa aktif.</p>
    </div>
</div>
@endsection
