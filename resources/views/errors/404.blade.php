<x-layout>
    <div class="text-center max-w-md">
        <!-- Accent Glow Code -->
        <span class="text-xs font-bold tracking-widest text-blue-500 uppercase px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20">
            Error 404
        </span>
        
        <h1 class="text-5xl font-black mt-6 tracking-tight">Lost in Space.</h1>
        
        <p class="text-zinc-400 mt-4 text-sm leading-relaxed">
            The page you are looking for doesn't exist or has been moved. Let's get you back on track to finding your next career move.
        </p>

        <div class="mt-8 flex items-center justify-center gap-4">
            <a href="/" class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-white text-black hover:bg-zinc-200 transition-all shadow-lg shadow-white/5">
                Go back home
            </a>
            <button onclick="history.back()" class="px-5 py-2.5 text-sm font-semibold rounded-lg border border-white/10 text-zinc-400 hover:text-white hover:bg-white/5 transition-colors">
                Previous page
            </button>
        </div>
    </div>
</x-layout>
