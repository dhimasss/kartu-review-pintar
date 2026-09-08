@extends('layouts.app')

@section('title', 'Verifikasi Keamanan')

@section('content')
<div class="w-full max-w-sm animate-fade-up" style="animation-delay: 0.1s;">
    
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold-display text-google-text mb-2">VERIFIKASI</h1>
        <p class="text-gray-500 font-medium">Masukkan PIN untuk mengedit link Anda.</p>
        @if($link->store_name)
            <p class="mt-3 text-sm font-bold-display text-google-green bg-google-green/10 border-2 border-google-green inline-block px-3 py-1 rounded-full shadow-[2px_2px_0px_#34A853]">
                {{ strtoupper($link->store_name) }}
            </p>
        @endif
    </div>

    <div class="card-solid p-8">
        <form action="{{ route('link.edit.update', $link->slug) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="pin" class="block text-sm font-bold-display text-google-text mb-2">PIN KARTU</label>
                <input type="password" name="pin" id="pin" required maxlength="6"
                       class="input-field {{ $errors->has('pin') ? 'error' : '' }}" 
                       placeholder="••••••">
                @error('pin')
                    <p class="mt-2 text-xs text-google-red font-bold flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="btn-google-blue">
                LANJUTKAN
                <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </button>
        </form>

        <div class="mt-6 pt-5 border-t-2 border-gray-100 text-center">
            <a href="{{ url('/' . $link->slug) }}" class="text-sm font-bold-display text-gray-400 hover:text-gray-600">
                &larr; KEMBALI
            </a>
        </div>
    </div>
</div>
@endsection
