<x-layout>
    <div class="max-w-3xl mx-auto mt-10 space-y-8">
        
        <!-- Back Button Link -->
        <a href="/" class="inline-flex items-center gap-2 text-sm text-zinc-500 hover:text-white transition-colors group">
            <svg class="h-4 w-4 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to all jobs
        </a>

        <!-- Main Job Card Wrapper -->
        <article class="relative p-8 rounded-2xl bg-zinc-900/50 border border-white/10 shadow-xl backdrop-blur-md">
            
            <!-- 3-Dots Dropdown Menu (Authorized Owners Only) -->
            @can('update', $job)
                <div x-data="{ open: false }" class="absolute top-6 right-6 z-10">
                    <button @click="open = !open" @click.outside="open = false" class="text-zinc-400 hover:text-white p-1.5 rounded-lg hover:bg-white/5 transition-colors focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>

                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-48 rounded-lg bg-zinc-800 border border-white/10 shadow-xl py-1 text-sm text-zinc-300 z-50" 
                         style="display: none;">
                        <a href="/jobs/{{ $job->id }}/edit" class="block px-4 py-2 hover:bg-white/5 hover:text-white transition-colors">Edit Job</a>
                        <hr class="border-white/5 my-1">
                        <form action="/jobs/{{ $job->id }}" method="POST" class="block w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-left block px-4 py-2 text-rose-400 hover:bg-rose-500/10 transition-colors">Delete Job</button>
                        </form>
                    </div>
                </div>
            @endcan

            <!-- Header Section: Logo + Title Info -->
            <header class="flex flex-col md:flex-row items-start gap-6 pb-6 border-b border-white/5 pr-12">
                <div class="flex-shrink-0 bg-zinc-800 p-2 rounded-xl border border-white/5">
                    <x-employer-logo :job="$job" class="w-16 h-16 object-cover rounded-lg" />
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="text-xs font-semibold tracking-wider text-blue-400 uppercase bg-blue-500/10 px-2.5 py-0.5 rounded-full border border-blue-500/20">
                            {{ $job->schedule }}
                        </span>
                        @if($job->featured)
                            <span class="text-xs font-semibold tracking-wider text-amber-400 uppercase bg-amber-500/10 px-2.5 py-0.5 rounded-full border border-amber-500/20">
                                Featured
                            </span>
                        @endif
                    </div>
                    <h1 class="text-3xl font-bold mt-2 text-white tracking-tight">{{ $job->title }}</h1>
                    <p class="text-lg text-zinc-400 mt-1 font-medium">{{ $job->employer->name }}</p>
                </div>
            </header>

            <!-- Metadata Overview Strip -->
            <section class="grid grid-cols-2 md:grid-cols-3 gap-6 py-6 border-b border-white/5 text-sm">
                <div>
                    <span class="block text-zinc-500 font-medium">Salary</span>
                    <span class="block font-semibold text-white mt-1 text-base">${{ $job->salary }}</span>
                </div>
                <div>
                    <span class="block text-zinc-500 font-medium">Location</span>
                    <span class="block font-semibold text-white mt-1 text-base">{{ $job->location }}</span>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <span class="block text-zinc-500 font-medium">Posted</span>
                    <span class="block font-semibold text-white mt-1 text-base">{{ $job->created_at->diffForHumans() }}</span>
                </div>
            </section>

            <!-- Job Tags Section -->
            <section class="py-6">
                <h4 class="text-xs font-semibold tracking-wider text-zinc-500 uppercase mb-3">Required Skills</h4>
                <div class="flex flex-wrap gap-2">
                    @forelse ($job->tags as $tag)
                        <x-tag :$tag />
                    @empty
                        <span class="text-sm text-zinc-600 italic">No specific tags specified</span>
                    @endforelse
                </div>
            </section>

            <!-- Action Area / Call To Action Footer -->
            <footer class="mt-4 pt-6 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-xs text-zinc-500">
                    Please mention <span class="text-zinc-400 font-semibold">Pixel Positions</span> when applying.
                </div>
                <a href="{{ $job->url }}" target="_blank" rel="noopener noreferrer" 
                   class="w-full sm:w-auto text-center px-6 py-3 text-sm font-semibold rounded-xl bg-blue-600 text-white hover:bg-blue-700 active:scale-95 transition-all shadow-lg shadow-blue-600/20">
                    Apply for this position
                </a>
            </footer>

        </article>
    </div>
</x-layout>
