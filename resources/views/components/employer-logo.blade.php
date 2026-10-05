@props(["job", "width"=>90])
@php
    $logo = Str::startsWith($job->employer->logo, ['http://', 'https://']) 
        ? $job->employer->logo 
        : asset('storage/' . $job->employer->logo);
@endphp
<img class="rounded-xl" src="{{ $logo }}" alt="Company Logo" width="{{ $width }}" height="{{ $width }}" />