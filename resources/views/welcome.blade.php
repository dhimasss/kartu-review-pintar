<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kartu Review Pintar – Solusi NFC & QR untuk mendorong ulasan Google Maps bisnis Anda secara otomatis.">
    <title>Kartu Review Pintar – NFC & QR Google Maps Review System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'ui-sans-serif'] },
                    animation: {
                        'fade-up': 'fadeUp 0.6s ease-out forwards',
                        'float':   'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: '0', transform: 'translateY(24px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%':      { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255,255,255,0.06); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1); }
        .hero-bg { background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0c1445 100%); }
        .feature-icon { background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%); }
    </style>
</head>
<body class="min-h-screen hero-bg text-white antialiased">

    {{-- Decorative orbs --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-60 -right-60 w-[600px] h-[600px] rounded-full opacity-10"
             style="background: radial-gradient(circle, #3b82f6, transparent 70%);"></div>
        <div class="absolute -bottom-60 -left-60 w-[600px] h-[600px] rounded-full opacity-10"
             style="background: radial-gradient(circle, #8b5cf6, transparent 70%);"></div>
    </div>

    <div class="relative">
        {{-- Hero --}}
        <section class="min-h-screen flex flex-col items-center justify-center px-4 text-center">

            {{-- Badge --}}
            <div class="mb-8 animate-fade-up">
                <span class="inline-flex items-center gap-2 glass rounded-full px-5 py-2 text-sm font-medium text-blue-300">
                    <span class="w-2 h-2 rounded-full bg-green-400 shadow-lg" style="box-shadow: 0 0 8px #22c55e;"></span>
                    Sistem Aktif & Siap Digunakan
                </span>
            </div>

            {{-- Floating card illustration --}}
            <div class="mb-10 animate-float" style="animation-delay: 0.2s;">
                <div class="w-20 h-20 mx-auto rounded-3xl flex items-center justify-center shadow-2xl"
                     style="background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%); box-shadow: 0 20px 60px rgba(59,130,246,0.5);">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75V16.5zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z"/>
                    </svg>
                </div>
            </div>

            <h1 class="text-4xl md:text-6xl font-black text-white mb-4 leading-tight animate-fade-up" style="animation-delay: 0.1s;">
                Kartu Review Pintar<br>
                <span style="background: linear-gradient(135deg, #60a5fa, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    NFC &amp; QR
                </span>
            </h1>

            <p class="text-lg md:text-xl text-white/60 max-w-xl mb-10 leading-relaxed animate-fade-up" style="animation-delay: 0.2s;">
                Satu sentuhan kartu → pelanggan langsung ke halaman ulasan Google Maps bisnis Anda. Tanpa app, tanpa login, tanpa ribet.
            </p>

            {{-- Features grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-3xl w-full mb-12 animate-fade-up" style="animation-delay: 0.3s;">
                <div class="glass rounded-2xl p-5 text-left">
                    <div class="w-10 h-10 feature-icon rounded-xl flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-white mb-1">Instant Redirect</h3>
                    <p class="text-xs text-white/50">Scan kartu → langsung ke Google Maps. Zero friction untuk pelanggan.</p>
                </div>
                <div class="glass rounded-2xl p-5 text-left">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-3"
                         style="background: linear-gradient(135deg, #10b981, #059669);">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-white mb-1">PIN Aman</h3>
                    <p class="text-xs text-white/50">Setiap kartu dilindungi PIN terenkripsi. Hanya Anda yang bisa mengedit.</p>
                </div>
                <div class="glass rounded-2xl p-5 text-left">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-3"
                         style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-white mb-1">Tanpa Akun</h3>
                    <p class="text-xs text-white/50">Frictionless onboarding. Aktivasi langsung dari kartu, tidak perlu daftar.</p>
                </div>
            </div>

            {{-- CTA --}}
            <div class="animate-fade-up" style="animation-delay: 0.4s;">
                <p class="text-white/40 text-sm">
                    Scan kartu NFC atau QR Code Anda untuk memulai, atau hubungi admin untuk mendapatkan kartu.
                </p>
                <div class="mt-4 glass rounded-2xl px-5 py-3 inline-flex items-center gap-2 text-sm text-white/60">
                    <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                    </svg>
                    Admin: <code class="text-blue-400">/admin/generate?secret=NFC-ADMIN-SECRET-2024</code>
                </div>
            </div>
        </section>
    </div>

    <footer class="relative text-center py-6 text-xs text-white/20">
        &copy; {{ date('Y') }} Kartu Review Pintar NFC &amp; QR &middot; Powered by Laravel
    </footer>
</body>
</html>
