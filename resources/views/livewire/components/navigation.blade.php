<nav class="w-[314px] min-h-screen bg-[#035B89] px-[50px] pt-[25px] flex flex-col fixed">
    <div>
        <h1 class="text-[40px] text-white mx-auto">LAB-ROOM</h1>
    </div>
    <div class="text-white mt-4">
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
        class="flex items-center gap-2 px-2 py-1 mt-auto mb-12 cursor-pointer hover:bg-[#2BA8D8] rounded transition-all ease-in-out">
        <x-heroicon-o-arrow-left-end-on-rectangle class="h-5 w-5 text-white" />
        <button wire:click="logout" class="text-lg text-white">Logout</button>
    </div>
</nav>
