@props(['active'])

@php
    $classes = "block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white mb-2";
@endphp

<a  {{ $attributes(["class" => $classes . ($active ? ' bg-blue-500 text-white ' : ' ')]) }}
>

{{ $slot }}

</a>
