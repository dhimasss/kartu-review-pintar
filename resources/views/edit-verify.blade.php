@extends('layouts.app')

@section('title', 'Verifikasi PIN – Edit Kartu')

@section('content')

<div class="w-full max-w-md animate-fade-up" style="animation-delay: 0.1s;">

    <div class="glass rounded-3xl p-8 shadow-2xl" style="box-shadow: 0 25px 60px rgba(0,0,0,0.4);">

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4"
                 style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); box-shadow: 0 8px 20px rgba(99,102,241,0.4);">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white mb-1">Verifikasi Identitas</h1>
            <p class="text-sm text-white/50">Kartu ID: <span class="font-mono text-indigo-400 font-semibold">{{ strtoupper($link->slug) }}</span></p>
            <p class="text-xs text-white/35 mt-1">Masukkan PIN untuk mengakses pengaturan kartu</p>
        </div>

        {{-- Error message --}}
        @if ($errors->has('pin'))
        <div class="mb-5 flex items-start gap-3 rounded-2xl p-4"
             style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25);">
            <svg class="w-5 h-5 text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <p class="text-sm text-red-300 font-medium">{{ $errors->first('pin') }}</p>
        </div>
        @endif

        {{-- Info box --}}
        <div class="mb-6 rounded-2xl p-4"
             style="background: rgba(99,102,241,0.08); border: 1px solid rgba(99,102,241,0.2);">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-indigo-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <p class="text-xs text-indigo-300">
                    PIN dibuat saat Anda mengaktifkan kartu pertama kali. Pastikan Anda memasukkan PIN yang benar.
                </p>
            </div>
        </div>

        {{-- Form Verifikasi PIN --}}
        <form id="form-pin" action="{{ route('link.edit.update', $link->slug) }}" method="POST" novalidate>
            @csrf

            <div class="mb-7">
                <label for="pin" class="block text-sm font-medium text-white/70 mb-2">
                    <svg class="inline w-4 h-4 mr-1 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                    Masukkan PIN Anda
                </label>

                {{-- PIN dots input --}}
                <div class="relative">
                    <input
                        type="number"
                        id="pin"
                        name="pin"
                        placeholder="••••••"
                        class="input-field {{ $errors->has('pin') ? 'error' : '' }} text-center text-xl tracking-[0.5em] font-bold"
                        maxlength="6"
                        min="1000"
                        max="999999"
                        autocomplete="off"
                        autofocus
                        required
                    >
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" id="btn-verify" class="btn-primary"
                    style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); box-shadow: 0 4px 15px rgba(99,102,241,0.35);">
                <svg id="icon-lock" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                <svg id="icon-loading-pin" class="w-5 h-5 hidden animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <span id="btn-text-pin">Verifikasi PIN</span>
            </button>
        </form>

        {{-- Back --}}
        <div class="mt-6 text-center">
            <a href="{{ route('link.show', $link->slug) }}"
               class="inline-flex items-center gap-1 text-xs text-white/30 hover:text-white/60 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- Security badges --}}
    <div class="mt-4 flex items-center justify-center gap-4 text-xs text-white/25">
        <span class="flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Verifikasi Aman
        </span>
        <span class="flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
            </svg>
            Bcrypt Hashed
        </span>
    </div>
</div>

<script>
    document.getElementById('form-pin').addEventListener('submit', function() {
        document.getElementById('btn-text-pin').textContent = 'Memverifikasi...';
        document.getElementById('icon-lock').classList.add('hidden');
        document.getElementById('icon-loading-pin').classList.remove('hidden');
        document.getElementById('btn-verify').disabled = true;
        document.getElementById('btn-verify').style.opacity = '0.8';
    });
</script>

@endsection
