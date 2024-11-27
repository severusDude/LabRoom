@props(['icon', 'active' => false, 'href'])

<a href="{{ $href }}"
    class="flex items-center gap-2 px-2 py-1 {{ $active ? 'border border-white rounded ' : '' }} cursor-pointer hover:bg-white hover:text-primary-800 rounded-lg group">
    <x-dynamic-component :component="$icon" class="w-5 h-5 text-white group-hover:text-primary-800" />
    <p class="text-lg group-hover:text-primary-800">{{ $slot }}</p>
</a>
