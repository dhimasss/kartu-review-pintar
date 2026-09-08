@extends('layouts.app')

@section('title', 'Kartu Berhasil Diaktifkan')

@section('content')

<div class="w-full max-w-sm animate-fade-up text-center" style="animation-delay: 0.1s;">

    {{-- Success icon --}}
    <div class="mb-8 flex justify-center">
        <div class="relative">
            {{-- Outer glow ring --}}
            <div class="absolute inset-0 rounded-full animate-ping opacity-20 bg-google-green" style="animation-duration: 2s;"></div>
            {{-- Icon container --}}
            <div class="relative w-24 h-24 rounded-full flex items-center justify-center bg-google-green border-4 border-white shadow-[0_10px_40px_rgba(52,168,83,0.4)]">
                <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>
        </div>
    </div>

    {{-- Card --}}
    <div class="card-solid p-8">

        <h1 class="text-3xl font-bold-display text-google-text mb-2">KARTU AKTIF!</h1>
        <p class="text-gray-500 font-bold text-sm mb-2">
            Kartu Review Pintar Anda siap digunakan.
        </p>
        
        @if($link->store_name)
            <p class="mb-6 text-sm font-bold-display text-google-blue bg-google-blue/10 border-2 border-google-blue inline-block px-3 py-1 rounded-full shadow-[2px_2px_0px_#4285F4]">
                {{ strtoupper($link->store_name) }}
            </p>
        @else
            <div class="mb-6"></div>
        @endif

        {{-- QR Code --}}
        <div class="rounded-xl p-6 mb-6 flex flex-col items-center justify-center text-center space-y-4 bg-gray-50 border-2 border-gray-100">
            <p class="text-sm font-bold-display text-google-text">QR CODE LINK ANDA</p>
            <div class="bg-white p-3 rounded-xl shadow-md border border-gray-200">
                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(160)->margin(1)->generate(url('/' . $link->slug)) !!}
            </div>
            
            {{-- Copy Link --}}
            <div class="w-full mt-2">
                <div class="flex items-center bg-white rounded-lg border-2 border-gray-200 p-1">
                    <input type="text" id="smart-link" value="{{ url('/' . $link->slug) }}" readonly class="bg-transparent text-sm font-mono text-gray-700 font-bold px-2 w-full outline-none">
                    <button onclick="copyLink()" class="bg-google-blue hover:bg-blue-600 text-white p-2 rounded-md transition-colors flex-shrink-0 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                        </svg>
                    </button>
                </div>
                <p id="copy-toast" class="text-[10px] font-bold text-google-green mt-1 opacity-0 transition-opacity">LINK BERHASIL DISALIN!</p>
            </div>
        </div>

        {{-- Instruksi scan ulang --}}
        <div class="rounded-xl p-4 mb-6 bg-google-blue/10 border-2 border-google-blue text-left">
            <p class="text-sm font-bold-display text-google-blue mb-1">LANGKAH SELANJUTNYA</p>
            <p class="text-xs font-bold text-gray-700 leading-relaxed">
                Scan ulang kartu NFC atau QR Code Anda. Pelanggan akan langsung diarahkan ke halaman ulasan Google Maps bisnis Anda.
            </p>
        </div>

        {{-- Action buttons --}}
        <div class="space-y-3">
            <a href="{{ route('link.edit.verify', $link->slug ?? '#') }}" class="btn-google-blue bg-white !text-google-blue hover:bg-gray-50 border-google-blue shadow-none">
                EDIT LINK DI KEMUDIAN HARI
            </a>
        </div>
    </div>
</div>

<script>
function copyLink() {
    var copyText = document.getElementById("smart-link");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    
    var toast = document.getElementById("copy-toast");
    toast.style.opacity = 1;
    setTimeout(function() {
        toast.style.opacity = 0;
    }, 2000);
}
</script>

@endsection
