<div class="px-0 py-20 lg:px-4 lg:py-0">
    <h1 class="mb-4 text-2xl font-semibold tracking-tighter lg:text-3xl">Selamat Datang 👏</h1>
    <div class="flex flex-wrap flex-1 gap-4">
        @foreach ($labs as $index => $lab)
            <livewire:components.card-lab :lab="$lab" :image="$images[$index]" />
        @endforeach
    </div>
</div>
