@props(['icon', 'active' => false, 'href'])

<a href="{{ $href }}"
    class="flex items-center gap-2 px-2 py-1 {{ $active ? 'border border-white rounded ' : '' }} cursor-pointer hover:bg-[#2BA8D8] rounded transition-all ease-in-out">
    <x-dynamic-component :component="$icon" class="h-5 w-5 text-white" />
    <p class="text-lg">{{ $slot }}</p>
</a>
