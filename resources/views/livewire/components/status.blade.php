@props(['large' => false])

@php
    $classes = $large
    //size large
    ? "inline-flex flex-col items-center px-4 py-1 border-2 border-solid rounded-full text-xl leading-[30px]"
    //size normal
    : "inline-flex flex-col items-center px-3 py-1 border border-solid rounded-full text-sm";

@endphp

<div {{ $attributes->merge(['class' => $classes])->merge(['class' => $class]) }}>
    {{ $label ?? 'Label' }}
</div>
