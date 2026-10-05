<x-layout>
    <x-page-heading>Post a new Job</x-page-heading>
    @if ($errors->any())
    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-sm text-red-600">
        <strong class="font-semibold block mb-1">Please fix the following errors:</strong>
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <x-forms.form action="/jobs" method="POST">
        <x-forms.input label="Job Title" name="title" />
        <x-forms.input label="Salary" name="salary" />
        <x-forms.input label="Location" name="location" />
        <x-forms.select label="Schedule" name="schedule">
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Contract">Contract</option>
        </x-forms.select>

        <x-forms.input label="Url" name="url" />
        <x-forms.checkbox label="Featured" name="featured" value="1" />
        
         <x-forms.select label="Tags" name="tags[]" id="tags" multiple>
            
            @foreach($tags as $tag)
                <option value="{{ $tag->name }}">
                    {{ $tag->name }}
                </option>
            @endforeach
        </x-forms.select>

        <x-forms.button>Post Job</x-forms.button>
    </x-forms.form>
</x-layout>