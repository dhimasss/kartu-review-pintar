@extends('layouts.app')

@section('title', 'Aktivasi Kartu')

@section('content')

<div class="w-full max-w-md animate-fade-up" style="animation-delay: 0.1s;">

    {{-- Card utama --}}
    <div class="glass rounded-3xl p-8 shadow-2xl" style="box-shadow: 0 25px 60px rgba(0,0,0,0.4), 0 0 40px rgba(59,130,246,0.1);">

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4"
                 style="background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%); box-shadow: 0 8px 20px rgba(59,130,246,0.4);">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white mb-1">Aktivasi Kartu</h1>
            <p class="text-sm text-white/50">Kartu ID: <span class="font-mono text-blue-400 font-semibold">{{ strtoupper($link->slug) }}</span></p>
            <p class="text-xs text-white/40 mt-1">Daftarkan bisnis Anda untuk mulai menerima ulasan Google</p>
        </div>

        {{-- Pesan sukses --}}
        @if (session('success'))
        <div class="mb-5 flex items-start gap-3 rounded-2xl p-4"
             style="background: rgba(34,197,94,0.12); border: 1px solid rgba(34,197,94,0.25);">
            <svg class="w-5 h-5 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <p class="text-sm text-green-300 font-medium">{{ session('success') }}</p>
        </div>
        @endif

        {{-- ⚠️ TOOLTIP / HINT BOX – Cara mendapatkan link Google Maps --}}
        <div class="mb-6 rounded-2xl p-4"
             style="background: linear-gradient(135deg, rgba(251,191,36,0.12) 0%, rgba(245,158,11,0.08) 100%); border: 1px solid rgba(251,191,36,0.3);">
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-8 h-8 rounded-xl flex items-center justify-center"
                     style="background: rgba(251,191,36,0.2);">
                    <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-amber-300 mb-2">💡 Cara Mendapatkan Link Google Maps</p>
                    <ol class="text-xs text-amber-200/80 space-y-1.5 list-none">
                        <li class="flex items-start gap-2">
                            <span class="flex-shrink-0 w-4 h-4 rounded-full bg-amber-500/30 text-amber-400 text-[10px] font-bold flex items-center justify-center mt-0.5">1</span>
                            Buka aplikasi <strong class="text-amber-300">Google Maps</strong> di ponsel Anda
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="flex-shrink-0 w-4 h-4 rounded-full bg-amber-500/30 text-amber-400 text-[10px] font-bold flex items-center justify-center mt-0.5">2</span>
                            Cari nama <strong class="text-amber-300">bisnis Anda</strong> di kolom pencarian
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="flex-shrink-0 w-4 h-4 rounded-full bg-amber-500/30 text-amber-400 text-[10px] font-bold flex items-center justify-center mt-0.5">3</span>
                            Klik tombol <strong class="text-amber-300">Bagikan (Share)</strong> di profil bisnis
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="flex-shrink-0 w-4 h-4 rounded-full bg-amber-500/30 text-amber-400 text-[10px] font-bold flex items-center justify-center mt-0.5">4</span>
                            Pilih <strong class="text-amber-300">Salin Tautan (Copy Link)</strong> dan tempel di bawah
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        {{-- Form Aktivasi --}}
        <form id="form-aktivasi" action="{{ route('link.activate', $link->slug) }}" method="POST" novalidate>
            @csrf

            {{-- Input URL Google Maps --}}
            <div class="mb-5">
                <label for="url_gmb" class="block text-sm font-medium text-white/70 mb-2">
                    <svg class="inline w-4 h-4 mr-1 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                    Link Google Maps Bisnis Anda
                </label>
                <input
                    type="url"
                    id="url_gmb"
                    name="url_gmb"
                    placeholder="https://maps.app.goo.gl/..."
                    value="{{ old('url_gmb') }}"
                    class="input-field {{ $errors->has('url_gmb') ? 'error' : '' }}"
                    autocomplete="off"
                    required
                >
                @error('url_gmb')
                    <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Input PIN --}}
            <div class="mb-7">
                <label for="pin" class="block text-sm font-medium text-white/70 mb-2">
                    <svg class="inline w-4 h-4 mr-1 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    Buat PIN Kartu (4–6 digit angka)
                </label>
                <input
                    type="number"
                    id="pin"
                    name="pin"
                    placeholder="Contoh: 123456"
                    class="input-field {{ $errors->has('pin') ? 'error' : '' }}"
                    maxlength="6"
                    min="1000"
                    max="999999"
                    required
                >
                <p class="mt-1.5 text-xs text-white/35">PIN digunakan untuk mengedit link di kemudian hari. Simpan baik-baik!</p>
                @error('pin')
                    <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" id="btn-submit" class="btn-primary">
                <svg id="icon-submit" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <svg id="icon-loading" class="w-5 h-5 hidden animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <span id="btn-text">Aktifkan Kartu Sekarang</span>
            </button>
        </form>

        {{-- Divider + edit link --}}
        <div class="mt-6 pt-5 border-t border-white/10 text-center">
            <p class="text-xs text-white/30">Sudah punya kartu aktif?</p>
            <a href="{{ route('link.edit.verify', $link->slug) }}"
               class="mt-1 inline-flex items-center gap-1 text-xs text-blue-400 hover:text-blue-300 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" />
                </svg>
                Edit / Perbarui Link
            </a>
        </div>
    </div>

    {{-- Keamanan badge --}}
    <div class="mt-4 flex items-center justify-center gap-4 text-xs text-white/25">
        <span class="flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
            </svg>
            PIN Dienkripsi
        </span>
        <span class="flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Koneksi Aman
        </span>
        <span class="flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
            </svg>
            Tanpa Login
        </span>
    </div>
</div>

<script>
    document.getElementById('form-aktivasi').addEventListener('submit', function() {
        document.getElementById('btn-text').textContent = 'Mengaktifkan...';
        document.getElementById('icon-submit').classList.add('hidden');
        document.getElementById('icon-loading').classList.remove('hidden');
        document.getElementById('btn-submit').disabled = true;
        document.getElementById('btn-submit').style.opacity = '0.8';
    });
</script>

@endsection
