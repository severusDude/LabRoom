@props(['icon', 'active' => false, 'href'])

<a href="{{ $href }}"
    class="block py-2 px-3  rounded {{ $active ? 'bg-[#035B89] text-white' : 'text-gray-900 rounded hover:bg-gray-100' }} "
    aria-current="page">{{ $slot }}</a>
