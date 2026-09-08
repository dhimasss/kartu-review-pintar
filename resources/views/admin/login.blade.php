@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="w-full max-w-sm animate-fade-up" style="animation-delay: 0.1s;">
    
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold-display text-google-text mb-2">LOGIN ADMIN</h1>
        <p class="text-gray-500 font-medium">Masukkan Secret Key untuk masuk.</p>
    </div>

    <div class="card-solid p-8">
        @if ($errors->any())
            <div class="bg-google-red/10 border-2 border-google-red text-google-red p-4 rounded-lg mb-6 text-sm font-bold">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.authenticate') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="secret" class="block text-sm font-bold-display text-google-text mb-2">SECRET KEY</label>
                <input type="password" name="secret" id="secret" required
                       class="input-field" 
                       placeholder="Masukkan secret key...">
            </div>

            <button type="submit" class="btn-google-blue">
                MASUK KE DASHBOARD
                <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </button>
        </form>
    </div>
</div>
@endsection
