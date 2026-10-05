@props(['job'])

{{-- Added matching dark border styles, group hover scaling, and animation transitions --}}
<x-panel class="relative p-6 rounded-xl bg-zinc-900 border border-white/10 flex flex-col text-center group transition-all duration-300 hover:border-white/20 hover:scale-[1.01]">
    
    {{-- Kept metadata subtext layout in its regular spot --}}
    <div class="text-sm text-left text-gray-400 truncate">{{ $job->employer->name }}</div>
    
    <div class="py-8">
        {{-- Swapped group-hover:text-blue-800 to group-hover:text-blue-500 to pop against the dark mode --}}
        <h3 class="font-bold text-xl text-white group-hover:text-blue-500 transition-colors duration-300">
            <!-- 1. Wrapped title text inside an anchor link to point to the specific job view -->
            <!-- 2. The 'after:absolute after:inset-0' pseudo-element covers the entire card box safely -->
            <a href="/jobs/{{ $job->id }}" class="after:absolute after:inset-0 after:z-0">
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm text-gray-400 mt-4 font-medium">{{ $job->salary }}</p>
    </div>

    <!-- Bottom Section: Split dynamically left and right -->
    {{-- Added relative z-10 layer here so tag click items and corporate logos react cleanly above the link --}}
    <div class="flex justify-between items-center mt-auto relative z-10">
        <div class="flex items-center gap-1 flex-wrap">
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>

        <x-employer-logo :job="$job" :width="42" />
    </div>
</x-panel>
