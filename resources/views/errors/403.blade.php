<x-layout>
    <div class="text-center max-w-md">
        <!-- Crimson Danger Accent Glow -->
        <span class="text-xs font-bold tracking-widest text-rose-500 uppercase px-3 py-1 rounded-full bg-rose-500/10 border border-rose-500/20">
            Error 403
        </span>
        
        <h1 class="text-5xl font-black mt-6 tracking-tight">Access Denied.</h1>
        
        <p class="text-zinc-400 mt-4 text-sm leading-relaxed">
            @if($exception->getMessage())
                {{ $exception->getMessage() }}
            @else
                You do not have permission to view or modify this resource. This action has been logged.
            @endif
        </p>

        <div class="mt-8">
            <a href="/" class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-zinc-900 border border-white/10 text-white hover:bg-white hover:text-black transition-all">
                Return to safety
            </a>
        </div>
    </div>
</x-layout>
