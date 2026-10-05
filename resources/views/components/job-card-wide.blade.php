@props(['job'])

{{-- Added hover effects (border-white/20, scale-[1.01]) to the panel wrapper --}}
<x-panel class="relative p-6 rounded-xl bg-zinc-900 border border-white/10 group transition-all duration-300 hover:border-white/20 hover:scale-[1.01]">
    
    <!-- 3-Column Layout Grid -->
    <div class="grid grid-cols-[auto_1fr_auto] gap-6 items-center">
        
        <!-- COLUMN 1 (LEFT): Employer Logo -->
        {{-- Added relative z-10 so the logo remains interactive above the card link overlay --}}
        <div class="flex-shrink-0 relative z-10">
            <x-employer-logo :job="$job" />
        </div>

        <!-- COLUMN 2 (MIDDLE): Employer Name, Job Title, and Salary -->
        <div class="flex flex-col justify-center min-w-0">
            {{-- Kept as a simple span, safely sitting under the pseudo-element link layer --}}
            <span class="text-sm text-gray-400 truncate">{{ $job->employer->name }}</span>
            
            <h3 class="text-xl font-bold mt-1 group-hover:text-blue-500 transition-colors duration-300 truncate">
                <!-- 1. Wrapped the title in an anchor link pointing to the show page -->
                <!-- 2. The 'after:absolute after:inset-0' utility stretches this link to make the entire card clickable -->
                <a href="/jobs/{{ $job->id }}" class="after:absolute after:inset-0 after:z-0">
                    {{ $job->title }}
                </a>
            </h3>
            <p class="text-sm text-gray-400 mt-2 font-medium">{{ $job->salary }}</p>
        </div>

        <!-- COLUMN 3 (RIGHT): Dropdown (Top Right of Column) & Tags (Bottom Right of Column) -->
        {{-- Added relative z-10 to ensure dropdowns and tags work perfectly without getting blocked by the card link --}}
        <div class="flex flex-col justify-between items-end h-full min-h-[100px] relative z-10">
            
            <!-- 3-Dots Dropdown Wrapper -->
            @can('update', $job)
            <div x-data="{ open: false }" class="relative self-end">
                <!-- 3-Dots Button -->
                <button @click="open = !open" @click.outside="open = false" class="text-zinc-400 hover:text-white p-1 rounded-lg hover:bg-white/5 transition-colors focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>

                <!-- Dropdown Menu Body -->
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

            <!-- Tags (Pushed to bottom right) -->
            <div class="flex items-center gap-1 mt-auto">
                @foreach ($job->tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
            
        </div>

    </div>
</x-panel>
