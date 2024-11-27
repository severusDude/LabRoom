<div class="flex flex-wrap items-start overflow-hidden bg-white shadow-md lg:flex-nowrap rounded-xl">
    <div class="flex self-stretch flex-1">
        <img class="object-fill w-full" src="{{ asset('images/' . $image . '.jpg') }}"
            alt="image lab">
    </div>
    {{-- <div class="self-stretch flex-1 lg:w-1/2 grow">
        <img class="object-cover w-full h-[284px] rounded-l-xl" src="{{ asset('images/' . $image . '.jpg') }}"
            alt="image lab">
    </div> --}}
    <div class="flex flex-col flex-1 gap-6 p-5 grow lg:flex-nowrap">
        <div class="flex flex-wrap items-start self-stretch gap-4 lg:flex-nowrap md:gap-0 md:justify-between">
            <h1 class="text-2xl font-semibold text-slate-800 leading-[27px]">Peminjaman {{ $history->id }}</h1>
            @switch($status)
                @case('Pending')
                    <livewire:components.status label="Pending" class="text-yellow-400 border-yellow-400" :large="true">
                @break

                @case('Approved')
                    <livewire:components.status label="Approved" class="text-green-400 border-green-400" :large="true">
                    {{-- <div class="inline text-sm font-semibold border-[1px] border-green-500 px-6 py-1 rounded-lg self-end">
                        {{ $status }}
                    </div> --}}
                @break

                @case('Rejected')
                    <livewire:components.status label="Rejected" class="text-red-700 border-red-700" :large="true">
                    {{-- <div class="inline text-sm font-semibold border-[1px] border-red-600 px-6 py-1 rounded-lg self-end">
                        {{ $status }}
                    </div> --}}
                @break
            @endswitch
        </div>

        <div class="flex flex-col items-start justify-center gap-[14px] self-stretch">
            <h1 class="text-base font-semibold text-slate-800">{{ $history->lab->lab_name }}</h1>

            <div class="flex flex-col items-start gap-[6px]">
                <h2 class="text-base font-medium text-slate-800/60">{{ $history->subject->name }}</h2>
                <p class="text-base font-medium text-slate-800/90">{{ $date }}</p>
                <p class="text-base font-bold text-slate-800/90">{{ $startTime }} - {{ $endTime }}</p>
            </div>
        </div>

        <hr class="w-full border-t border-gray-300">

        <div class="flex items-center justify-center flex-1 gap-[16px] self-stretch">
            <div class="flex flex-col items-center flex-1 gap-2">
                <h1 class="text-sm font-medium text-center text-gray-800/70">Persetujuan Oleh</h1>
                <p class="text-base font-semibold text-center">{{ $history->approval->approved_by ?? '...' }}</p>
            </div>
            <div class="flex flex-col items-center flex-1 gap-2">
                <h1 class="text-sm font-medium text-center text-gray-800/70">Repeat</h1>
                <p class="text-base font-semibold text-center">{{ $history->is_repeat ? 'Yes' : 'No' }}</p>
            </div>
            <button class="px-6 py-2 text-white bg-red-800 rounded-lg">Cancel</button>
        </div>
{{--
        <div class="mt-6 lg:mt-2">
            <h1 class="text-2xl font-semibold text-slate-800">{{ $history->lab->lab_name }}</h1>
            <p class="text-lg tracking-tight text-slate-800/70">{{ $history->subject->name }}</p>
        </div>
        <div class="mt-4 text-lg font-bold">
            {{ $startTime }} - {{ $endTime }}
        </div>
        <div class="flex items-center justify-between w-full py-4 mt-auto">
            <div class="flex flex-col items-center">
                <h1 class="text-sm text-slate-800/80">Persetujuan</h1>
                <p class="text-sm text-slate-900">
                    {{ $approvedBy }}
                </p>
            </div>
            <button class="px-4 py-2 bg-red-500 rounded-lg">
                Report
            </button>
            <div class="flex flex-col items-center">
                <h1 class="text-sm text-slate-800/80">Repeat</h1>
                <p class="text-sm text-slate-900">No</p>
            </div>
        </div> --}}
    </div>
</div>
