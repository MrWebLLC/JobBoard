<x-layout>
    <div class="max-w-2xl mx-auto mt-10 p-8 bg-zinc-900/50 border border-white/10 rounded-2xl shadow-xl">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-white">Edit Job Posting</h1>
            <p class="text-sm text-zinc-400 mt-1">Modify the details for your listing at {{ $job->employer->name }}.</p>
        </div>

        <form action="/jobs/{{ $job->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH') {{-- Or @method('PUT') depending on your routing setup --}}

            <!-- Job Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-zinc-300 mb-2">Job Title</label>
                <input type="text" id="title" name="title" 
                    value="{{ old('title', $job->title) }}" 
                    class="w-full bg-black border border-white/10 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-colors @error('title') border-rose-500 @enderror"
                    placeholder="e.g., Senior Laravel Developer">
                @error('title')
                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Grid for Salary & Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Salary -->
                <div>
                    <label for="salary" class="block text-sm font-semibold text-zinc-300 mb-2">Salary</label>
                    <input type="text" id="salary" name="salary" 
                        value="{{ old('salary', $job->salary) }}" 
                        class="w-full bg-black border border-white/10 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-colors @error('salary') border-rose-500 @enderror"
                        placeholder="e.g., $90,000 - $110,000 USD">
                    @error('salary')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-semibold text-zinc-300 mb-2">Location</label>
                    <input type="text" id="location" name="location" 
                        value="{{ old('location', $job->location) }}" 
                        class="w-full bg-black border border-white/10 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-colors @error('location') border-rose-500 @enderror"
                        placeholder="e.g., Remote, New York, NY">
                    @error('location')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Grid for Schedule & URL -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Schedule -->
                <div>
                    <label for="schedule" class="block text-sm font-semibold text-zinc-300 mb-2">Schedule</label>
                    <select id="schedule" name="schedule" 
                        class="w-full bg-black border border-white/10 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-colors @error('schedule') border-rose-500 @enderror">
                        <option value="Full Time" {{ old('schedule', $job->schedule) === 'Full Time' ? 'selected' : '' }}>Full Time</option>
                        <option value="Part Time" {{ old('schedule', $job->schedule) === 'Part Time' ? 'selected' : '' }}>Part Time</option>
                        <option value="Contract" {{ old('schedule', $job->schedule) === 'Contract' ? 'selected' : '' }}>Contract</option>
                        <option value="Freelance" {{ old('schedule', $job->schedule) === 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                    @error('schedule')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Application URL -->
                <div>
                    <label for="url" class="block text-sm font-semibold text-zinc-300 mb-2">Application URL</label>
                    <input type="url" id="url" name="url" 
                        value="{{ old('url', $job->url) }}" 
                        class="w-full bg-black border border-white/10 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-colors @error('url') border-rose-500 @enderror"
                        placeholder="https://example.com">
                    @error('url')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Featured Checkbox Toggle -->
            <div class="flex items-start pt-2">
                <div class="flex items-center h-5">
                    <input type="checkbox" id="featured" name="featured" value="1"
                        {{ old('featured', $job->featured) ? 'checked' : '' }}
                        class="h-4 w-4 bg-black border-white/10 rounded text-blue-600 focus:ring-blue-500 focus:ring-offset-black">
                </div>
                <div class="ml-3 text-sm">
                    <label for="featured" class="font-semibold text-zinc-300">Feature this listing</label>
                    <p class="text-zinc-500 text-xs">Highlight this job post at the top of the job feed (Premium feature).</p>
                </div>
            </div>

            <!-- Actions Row -->
            <div class="flex items-center justify-end gap-4 pt-4 border-t border-white/5">
                <a href="/" class="px-5 py-2.5 text-sm font-semibold rounded-lg border border-white/10 text-zinc-400 hover:text-white hover:bg-white/5 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-zinc-900 transition-all">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-layout>