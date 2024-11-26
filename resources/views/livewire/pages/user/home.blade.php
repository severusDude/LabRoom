<div class="lg:px-4 lg:py-0 py-20 px-0">
    <h1 class="text-2xl lg:text-3xl font-semibold tracking-tighter mb-4">Selamat Datang 👏</h1>
    <div class="flex gap-3 flex-wrap flex-1">
        @foreach ($labs as $index => $lab)
            <livewire:components.card-lab :lab="$lab" :image="$images[$index]" />
        @endforeach
    </div>
</div>
