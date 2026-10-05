@props(["tag", "size"=>"base"])
@php
    
    $classes = 'bg-white/10  rounded-xl font-bold hover:bg-white/25 transition-colors duration-300';

    if($size === "small"){
        $classes .= " text-2xs py-1 px-3";
    }
    elseif($size === "base"){
        $classes .= " text-xs py-1 px-5";
    }
@endphp
<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">{{ $tag->name }}</a>
