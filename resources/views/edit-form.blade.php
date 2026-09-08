@extends('layouts.app')

@section('title', 'Perbarui Link Google Maps')

@section('content')
<div class="w-full max-w-md animate-fade-up" style="animation-delay: 0.1s;">
    
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold-display text-google-text mb-2">EDIT LINK</h1>
        <p class="text-gray-500 font-medium">Perbarui tujuan link kartu Anda.</p>
        @if($link->store_name)
            <p class="mt-3 text-sm font-bold-display text-google-green bg-google-green/10 border-2 border-google-green inline-block px-3 py-1 rounded-full shadow-[2px_2px_0px_#34A853]">
                {{ strtoupper($link->store_name) }}
            </p>
        @endif
    </div>

    <div class="card-solid p-8">
        <form action="{{ route('link.edit.update', $link->slug) }}" method="POST" class="space-y-6">
            @csrf
            
            {{-- Kita kirim ulang PIN dari request sebelumnya agar lolos verifikasi kedua --}}
            <input type="hidden" name="pin" value="{{ request('pin') }}">

            <div>
                <label for="url_gmb" class="block text-sm font-bold-display text-google-text mb-2">LINK GOOGLE MAPS BARU</label>
                <input type="url" name="url_gmb" id="url_gmb" required 
                       class="input-field {{ $errors->has('url_gmb') ? 'error' : '' }}" 
                       placeholder="https://maps.app.goo.gl/..."
                       value="{{ old('url_gmb', $link->url_gmb) }}">
                @error('url_gmb')
                    <p class="mt-2 text-xs text-google-red font-bold flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="btn-google-blue">
                SIMPAN PERUBAHAN
                <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </button>
        </form>
    </div>
</div>
@endsection
