@if (session('success'))
    <div class="mb-6 p-4 rounded-xl bg-zinc-900/50 border border-emerald-500/30 backdrop-blur-md flex items-center gap-3 text-sm text-emerald-400 shadow-[0_0_15px_rgba(16,185,129,0.05)] animate-fade-in">
        <!-- Checkmark Icon -->
        <svg class="h-5 w-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>
            <span class="font-semibold text-emerald-300">Success!</span> {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="mb-6 p-4 rounded-xl bg-zinc-900/50 border border-rose-500/30 backdrop-blur-md flex items-center gap-3 text-sm text-rose-400 shadow-[0_0_15px_rgba(244,63,94,0.05)]">
        <!-- Error/X Icon -->
        <svg class="h-5 w-5 text-rose-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>
            <span class="font-semibold text-rose-300">Error!</span> {{ session('error') }}
        </div>
    </div>
@endif
