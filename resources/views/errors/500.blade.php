<x-layout>
<body class="bg-black text-white font-hanken flex min-h-screen flex-col items-center justify-center p-6">
    <div class="text-center max-w-md">
        <!-- Amber Warning Accent Glow -->
        <span class="text-xs font-bold tracking-widest text-amber-500 uppercase px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20">
            Error 500
        </span>
        
        <h1 class="text-5xl font-black mt-6 tracking-tight">Our bad.</h1>
        
        <p class="text-zinc-400 mt-4 text-sm leading-relaxed">
            Something went wrong on our servers. We've been notified and are looking into it right now. Please try again shortly.
        </p>

        <div class="mt-8">
            <button onclick="window.location.reload()" class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-all">
                Refresh Page
            </button>
        </div>
    </div>
</x-layout>
