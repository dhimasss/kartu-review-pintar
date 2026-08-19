@extends('layouts.app')

@section('title', 'Kartu Berhasil Diaktifkan')

@section('content')

<div class="w-full max-w-sm animate-fade-up text-center" style="animation-delay: 0.1s;">

    {{-- Success icon dengan animasi --}}
    <div class="mb-8 flex justify-center">
        <div class="relative">
            {{-- Outer glow ring --}}
            <div class="absolute inset-0 rounded-full animate-ping opacity-20"
                 style="background: radial-gradient(circle, #22c55e, transparent); animation-duration: 2s;"></div>
            {{-- Icon container --}}
            <div class="relative w-24 h-24 rounded-full flex items-center justify-center"
                 style="background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); box-shadow: 0 10px 40px rgba(34,197,94,0.4);">
                <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>
        </div>
    </div>

    {{-- Card --}}
    <div class="glass rounded-3xl p-8 shadow-2xl" style="box-shadow: 0 25px 60px rgba(0,0,0,0.4), 0 0 40px rgba(34,197,94,0.08);">

        <h1 class="text-2xl font-bold text-white mb-2">🎉 Kartu Aktif!</h1>
        <p class="text-white/60 text-sm mb-6">
            Kartu Review Pintar Anda telah berhasil didaftarkan dan siap digunakan.
        </p>

        {{-- Status info --}}
        <div class="rounded-2xl p-4 mb-6 text-left space-y-3"
             style="background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.2);">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0"
                     style="background: rgba(34,197,94,0.2);">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-green-400 font-semibold">Link Google Maps</p>
                    <p class="text-xs text-white/50 truncate">Terdaftar & Aktif</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0"
                     style="background: rgba(34,197,94,0.2);">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-green-400 font-semibold">PIN Keamanan</p>
                    <p class="text-xs text-white/50">Terenkripsi & Tersimpan</p>
                </div>
            </div>
        </div>

        {{-- Instruksi scan ulang --}}
        <div class="rounded-2xl p-4 mb-6"
             style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0"
                     style="background: rgba(59,130,246,0.2);">
                    <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75V16.5zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                    </svg>
                </div>
                <div class="text-left">
                    <p class="text-xs font-semibold text-blue-300 mb-1">📱 Langkah Selanjutnya</p>
                    <p class="text-xs text-white/50">
                        Scan ulang kartu NFC atau QR Code Anda. Pelanggan akan langsung diarahkan ke halaman ulasan Google Maps bisnis Anda.
                    </p>
                </div>
            </div>
        </div>

        {{-- Action buttons --}}
        <div class="space-y-3">
            <a href="{{ route('link.edit.verify', $link->slug ?? '#') }}"
               class="btn-primary no-underline text-white"
               style="text-decoration: none;">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                </svg>
                Edit Link Di Kemudian Hari
            </a>
        </div>
    </div>

    {{-- Hint --}}
    <p class="mt-4 text-xs text-white/25">
        Simpan PIN Anda! PIN diperlukan untuk mengubah link Google Maps.
    </p>
</div>

@endsection
