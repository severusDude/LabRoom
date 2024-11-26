<div class="flex flex-wrap lg:flex-nowrap bg-white rounded-md shadow-md">
    <div class="w-full lg:w-1/2">
        <img class="w-full h-[248px] object-cover rounded-md" src="{{ asset('images/' . $image . '.jpg') }}"
            alt="image lab">
    </div>
    <div class="py-4 px-6 flex flex-col flex-1">
        @switch($status)
            @case('Pending')
                <div class="inline text-sm font-semibold border-[1px] border-yellow-300 px-6 py-1 rounded-lg self-end">
                    {{ $status }}
                </div>
            @break

            @case('Approved')
                <div class="inline text-sm font-semibold border-[1px] border-green-500 px-6 py-1 rounded-lg self-end">
                    {{ $status }}
                </div>
            @break

            @case('Rejected')
                <div class="inline text-sm font-semibold border-[1px] border-red-600 px-6 py-1 rounded-lg self-end">
                    {{ $status }}
                </div>
            @break
        @endswitch
        <div class="lg:mt-2 mt-6">
            <h1 class="text-2xl font-semibold text-slate-800">{{ $history->lab->lab_name }}</h1>
            <p class="text-lg tracking-tight text-slate-800/70">{{ $history->subject->name }}</p>
        </div>
        <div class="mt-4 font-bold text-lg">
            {{ $startTime }} - {{ $endTime }}
        </div>
        <div class="flex w-full justify-between items-center mt-auto py-4">
            <div class="flex flex-col items-center">
                <h1 class="text-sm text-slate-800/80">Persetujuan</h1>
                <p class="text-sm text-slate-900">
                    {{ $approvedBy }}
                </p>
            </div>
            <button class="px-4 py-2 rounded-lg bg-red-500">
                Report
            </button>
            <div class="flex flex-col items-center">
                <h1 class="text-sm text-slate-800/80">Repeat</h1>
                <p class="text-sm text-slate-900">No</p>
            </div>
        </div>
    </div>
</div>
