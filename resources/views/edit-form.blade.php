@extends('layouts.app')

@section('title', 'Edit Link – Kartu ' . strtoupper($link->slug))

@section('content')

<div class="w-full max-w-md animate-fade-up" style="animation-delay: 0.1s;">

    <div class="glass rounded-3xl p-8 shadow-2xl" style="box-shadow: 0 25px 60px rgba(0,0,0,0.4), 0 0 40px rgba(99,102,241,0.08);">

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4"
                 style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); box-shadow: 0 8px 20px rgba(16,185,129,0.4);">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white mb-1">Edit Link</h1>
            <p class="text-sm text-white/50">Kartu ID: <span class="font-mono text-emerald-400 font-semibold">{{ strtoupper($link->slug) }}</span></p>
            <p class="text-xs text-white/35 mt-1">PIN terverifikasi — Perbarui link Google Maps Anda</p>
        </div>

        {{-- PIN verified badge --}}
        <div class="mb-5 flex items-center gap-2 rounded-xl px-3 py-2.5 justify-center"
             style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.2);">
            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-xs font-semibold text-green-400">Identitas Terverifikasi</span>
        </div>

        {{-- Current URL info --}}
        <div class="mb-6 rounded-2xl p-4"
             style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
            <p class="text-xs text-white/40 mb-1.5 font-medium">Link saat ini:</p>
            <a href="{{ $link->url_gmb }}" target="_blank" rel="noopener"
               class="text-xs text-blue-400 hover:text-blue-300 break-all transition-colors flex items-start gap-1.5">
                <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
                {{ $link->url_gmb }}
            </a>
        </div>

        {{-- Error messages --}}
        @if ($errors->any())
        <div class="mb-5 rounded-2xl p-4"
             style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25);">
            @foreach ($errors->all() as $error)
            <p class="text-sm text-red-300 flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ $error }}
            </p>
            @endforeach
        </div>
        @endif

        {{-- Form Edit URL --}}
        <form id="form-edit" action="{{ route('link.edit.update', $link->slug) }}" method="POST" novalidate>
            @csrf

            {{-- Hidden PIN (re-submitted untuk verifikasi ulang) --}}
            <input type="hidden" name="pin" value="{{ request()->old('pin', '') }}">

            {{-- Input URL Baru --}}
            <div class="mb-5">
                <label for="url_gmb" class="block text-sm font-medium text-white/70 mb-2">
                    <svg class="inline w-4 h-4 mr-1 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                    Link Google Maps Baru
                </label>
                <input
                    type="url"
                    id="url_gmb"
                    name="url_gmb"
                    placeholder="https://maps.app.goo.gl/..."
                    value="{{ old('url_gmb', $link->url_gmb) }}"
                    class="input-field {{ $errors->has('url_gmb') ? 'error' : '' }}"
                    autocomplete="off"
                    required
                >
                @error('url_gmb')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tip --}}
            <div class="mb-7 rounded-xl p-3"
                 style="background: rgba(251,191,36,0.08); border: 1px solid rgba(251,191,36,0.2);">
                <p class="text-xs text-amber-300/80">
                    💡 Pastikan URL berasal dari Google Maps. Buka Google Maps → Cari bisnis Anda → Klik <strong>Bagikan</strong> → <strong>Salin Tautan</strong>.
                </p>
            </div>

            {{-- Submit --}}
            <button type="submit" id="btn-save" class="btn-primary"
                    style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); box-shadow: 0 4px 15px rgba(16,185,129,0.35);">
                <svg id="icon-save" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <svg id="icon-loading-save" class="w-5 h-5 hidden animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <span id="btn-text-save">Simpan Perubahan</span>
            </button>
        </form>

        {{-- Back --}}
        <div class="mt-6 text-center">
            <a href="{{ route('link.edit.verify', $link->slug) }}"
               class="inline-flex items-center gap-1 text-xs text-white/30 hover:text-white/60 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Ganti PIN
            </a>
        </div>
    </div>
</div>

<script>
    document.getElementById('form-edit').addEventListener('submit', function() {
        document.getElementById('btn-text-save').textContent = 'Menyimpan...';
        document.getElementById('icon-save').classList.add('hidden');
        document.getElementById('icon-loading-save').classList.remove('hidden');
        document.getElementById('btn-save').disabled = true;
        document.getElementById('btn-save').style.opacity = '0.8';
    });
</script>

@endsection
