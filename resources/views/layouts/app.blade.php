<!DOCTYPE html>
<html lang="en" x-data="{ theme: localStorage.getItem('theme') || 'dark' }" :class="{ 'dark': theme === 'dark' }" x-init="$watch('theme', value => localStorage.setItem('theme', value))">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedXD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        
        /* Custom Confetti Animation Keyframes */
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }
        .confetti-piece {
            position: absolute;
            bottom: -20px;
            width: 10px;
            height: 10px;
            background-color: #10b981;
            animation: float 3s ease-in infinite;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-300 font-sans antialiased selection:bg-emerald-500/30 selection:text-emerald-900 dark:selection:text-emerald-200 min-h-screen flex flex-col transition-colors duration-300">
    <nav class="bg-white/80 dark:bg-slate-950/80 backdrop-blur-lg shadow-sm border-b border-slate-200 dark:border-white/10 sticky top-0 z-50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-black text-slate-900 dark:text-white tracking-tighter transition-colors">
                            Med<span class="text-emerald-500">XD</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <button @click="theme = theme === 'dark' ? 'light' : 'dark'" class="p-2 rounded-lg text-slate-500 hover:text-emerald-600 dark:text-slate-400 dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-white/5 transition-colors" title="Toggle Theme">
                        <svg x-show="theme === 'light'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                        <svg x-cloak x-show="theme === 'dark'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
    
    <footer class="bg-white dark:bg-slate-950 border-t border-slate-200 dark:border-white/10 mt-auto py-6 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm text-slate-500 font-medium">
            &copy; {{ date('Y') }} MedXD. Study Smarter.
        </div>
    </footer>
</body>
</html>
