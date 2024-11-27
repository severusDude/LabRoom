<div class="flex flex-col items-start justify-end w-full lg:w-[350px] overflow-hidden rounded-lg shadow-md">
    <div class="w-full">
        <img class="object-cover w-full h-full" src="{{ asset('images/' . $image['name'] . '.jpg') }}"
            alt="image lab">
    </div>
    <div class="flex flex-col items-start self-stretch justify-center flex-1 w-full gap-6 p-5">
        <div class="flex flex-row items-start justify-between flex-1 w-full">
            <div class="flex flex-col flex-1 items-start gap-[10px]">
                <h1 class="text-xl text-wrap font-semibold leading-[27px]">{{ $lab->lab_name }}</h1>
                <h2 class="text-base font-medium text-gray-700/70">{{  $lab->location }}</h2>
            </div>
            <div class="flex items-end justify-end flex-1 w-1/4">
                @if ($status)
                    <livewire:components.status label="Tersedia" class="text-primary-700 border-primary-700">
                @else
                    <livewire:components.status label="Berlangsung" class="text-yellow-400 border-yellow-400">
                @endif
            </div>
        </div>
        <div class="flex items-start self-stretch justify-between flex-1">
            <div class="flex flex-col items-center gap-3">
                <h1 class="text-sm font-medium text-gray-700/80">Kapasitas</h1>
                <p class="text-base font-semibold">{{ $lab->capacity }}</p>
            </div>
            <div class="flex flex-col items-center gap-3">
                <h1 class="text-sm font-medium text-gray-700/80">Lokasi</h1>
                <p class="text-base font-semibold">{{ $lab->location }}</p>
            </div>
            <div class="flex flex-col items-center gap-3">
                <h1 class="text-sm font-medium text-gray-700/80">Ketersediaan</h1>
                <p class="text-base font-semibold">{{ $status ? 'Yes' : 'No' }}</p>
            </div>
        </div>

        {{-- Button start --}}
        <button wire:click="redirectTo({{ $id }})"
            class="flex items-center justify-center w-full gap-2 px-4 py-2 transition-all ease-in-out rounded-lg bg-primary-700 hover:bg-primary-800">
            <h2 class="text-lg font-medium text-white lg:font-semibold">Pinjam</h2>
            <x-heroicon-o-plus class="w-5 h-5 text-white" />
        </button>
        {{-- Button end --}}
    </div>
</div>
