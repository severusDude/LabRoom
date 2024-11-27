<div class="lg:pt-0 pt-20">
    <h1 class="text-3xl font-semibold tracking-tighter mb-4 text-slate-700">Riwayat Peminjaman</h1>
    <div>
        {{-- CARD --}}
        <div class="space-y-4">
            @foreach ($historyLoan as $data)
                <livewire:components.card-history :history="$data" />
            @endforeach
            {{ $historyLoan->links() }}
        </div>
    </div>
</div>
