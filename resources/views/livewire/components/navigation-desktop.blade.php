<nav class="hidden w-[314px] min-h-screen bg-primary-800 px-[50px] pt-[25px] lg:flex flex-col fixed">
    <div>
        <h1 class="text-[40px] text-white mx-auto">LAB-ROOM</h1>
    </div>
    <div class="mt-4 text-white">
        <div class="space-y-2">
            <x-custom.item-navigation :icon="'heroicon-o-home'" :active="request()->routeIs('user.home')" href="{{ route('user.home') }}">
                Beranda
            </x-custom.item-navigation>
            <x-custom.item-navigation :icon="'heroicon-o-calendar-date-range'" :active="request()->routeIs('user.loan')" href="{{ route('user.loan') }}">
                Peminjaman
            </x-custom.item-navigation>
            <x-custom.item-navigation :icon="'heroicon-o-archive-box'" :active="request()->routeIs('user.history')" href="{{ route('user.history') }}">
                Riwayat
            </x-custom.item-navigation>
        </div>
    </div>
    <div
        class="flex items-center gap-2 px-2 py-1 mt-auto mb-12 rounded cursor-pointer hover:bg-white hover:text-primary-800 group">
        <x-heroicon-o-arrow-left-end-on-rectangle class="w-5 h-5 text-white group-hover:text-primary-800" />
        <button wire:click="logout" class="text-lg text-white group-hover:text-primary-800">Logout</button>
    </div>
</nav>
