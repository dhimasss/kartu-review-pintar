<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kartu Review Pintar NFC & QR – Aktivasi kartu digital Anda dan arahkan pelanggan langsung ke ulasan Google Maps bisnis Anda.">
    <title>@yield('title', 'Kartu Review Pintar') – NFC & QR</title>

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- TailwindCSS Play CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                    colors: {
                        brand: {
                            50:  '#eff6ff',
                            100: '#dbeafe',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    backgroundImage: {
                        'hero-gradient': 'linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0c1445 100%)',
                    },
                    animation: {
                        'fade-up': 'fadeUp 0.5s ease-out forwards',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%':      { transform: 'translateY(-8px)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glass-white {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 0.75rem;
            color: white;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            outline: none;
        }
        .input-field::placeholder { color: rgba(255,255,255,0.35); }
        .input-field:focus {
            background: rgba(255,255,255,0.12);
            border-color: rgba(99,179,237,0.7);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
        }
        .input-field.error {
            border-color: rgba(248,113,113,0.7);
            box-shadow: 0 0 0 3px rgba(239,68,68,0.15);
        }
        .btn-primary {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 0.875rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(59,130,246,0.35);
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(59,130,246,0.5);
        }
        .btn-primary:active { transform: translateY(0); }
        .glow-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 10px #22c55e, 0 0 20px rgba(34,197,94,0.4);
            animation: pulse 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-full bg-hero-gradient font-sans antialiased">

    {{-- Decorative background orbs --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full opacity-10 animate-pulse-slow"
             style="background: radial-gradient(circle, #3b82f6, transparent 70%);"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full opacity-10 animate-pulse-slow"
             style="background: radial-gradient(circle, #6366f1, transparent 70%); animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full opacity-5"
             style="background: radial-gradient(circle, #818cf8, transparent 70%);"></div>
    </div>

    {{-- Main content --}}
    <main class="relative min-h-screen flex flex-col items-center justify-center px-4 py-12">

        {{-- Logo/Brand --}}
        <div class="mb-8 text-center animate-fade-up">
            <div class="inline-flex items-center gap-3 glass rounded-full px-5 py-2.5">
                <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-sm font-semibold text-white/80 tracking-wide">Kartu Review Pintar</span>
                <div class="glow-dot"></div>
            </div>
        </div>

        @yield('content')

        {{-- Footer --}}
        <p class="mt-10 text-xs text-white/25 text-center">
            &copy; {{ date('Y') }} Kartu Review Pintar NFC &amp; QR &middot; Powered by Smart Link Engine
        </p>
    </main>

</body>
</html>
