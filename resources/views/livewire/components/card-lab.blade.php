<div class="w-[300px] rounded shadow-md pb-2">
    <div>
        <img class="w-full h-[150px] object-cover rounded-t" src="{{ asset('images/bakso.jpeg') }}" alt="image lab">
    </div>
    <div class="px-2 py-3 space-y-2 py">
        <div class="space-y-1">
            <a href="/lab/{{ $id }}" class="text-xl font-bold">{{ $lab->lab_name }}</a>
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
    </div>
</div>
