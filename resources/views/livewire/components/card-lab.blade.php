<div class="w-full lg:w-[300px] rounded shadow-md pb-2">
    <div>
        <img class="w-full h-[150px] object-cover rounded-t" src="{{ asset('images/' . $image['name'] . '.jpg') }}"
            alt="image lab">
    </div>
    <div class="px-2 py-3 space-y-2 py">
        <div class="space-y-1">
            <h2 class="text-xl font-bold">{{ $lab->lab_name }}</h2>
            <p class="text-sm">{{ $lab->location }}</p>
        </div>
        <div class="flex justify-between">
            <div class="flex items-center flex-col">
                <p class="text-slate-500 text-xs">Kapasitas</p>
                <p class="text-slate-600 text-sm">{{ $lab->capacity }} Orang</p>
            </div>
            <div class="flex items-center flex-col">
                <p class="text-slate-500 text-xs">Detail Lokasi</p>
                <p class="text-slate-600 text-sm">{{ $lab->location }}</p>
            </div>
            <div class="flex items-center flex-col">
                <p class="text-slate-500 text-xs">Ketersediaan</p>
                <p class="text-slate-600 text-sm">No</p>
            </div>
        </div>

        {{-- Button start --}}
        <div>
            <button wire:click="redirectTo({{ $id }})"
                class="py-2 px-4 rounded bg-emerald-500 w-full  flex items-center justify-center gap-2 hover:bg-emerald-500/60">
                <h2 class="font-medium lg:font-semibold text-lg">Pinjam</h2>
                <x-heroicon-o-plus class="h-5 w-5 text-white" />
            </button>
        </div>
        {{-- Button end --}}
    </div>
</div>
