<div class="mt-4">
    @if (session()->has('message'))
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ session('message') }}
            </div>
        </div>
    @endif
    <h1 class="text-3xl font-semibold tracking-tighter mb-4 text-slate-700">Ajukan Peminjaman</h1>
    <div class="flex justify-center items-center">
        <form wire:submit.prevent='onSubmit' class="w-full bg-violet-200 px-8 py-12 space-y-4 rounded">
            {{-- Select Lab Start --}}
            <div>
                <label for="lab"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laboratorium</label>
                <select id="lab" wire:model='labInput'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled>Pilih Laboratorium</option>
                    @if (isset($lab))
                        <option selected value="{{ $lab->id }}">{{ $lab->lab_name }}</option>
                        @foreach ($labs as $item)
                            @if ($item->lab_name != $lab->lab_name)
                                <option value="{{ $item->id }}">{{ $item->lab_name }}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach ($labs as $item)
                            <option value="{{ $item->id }}">{{ $item->lab_name }}</option>
                        @endforeach
                    @endif

                </select>
            </div>
            {{-- Select Lab End --}}

            {{-- Select Matakuliah Start --}}
            <div>
                <label for="mata_kuliah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata
                    Kuliah</label>
                <select id="mata_kuliah" wire:model='mataKuliahInput'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Pilih Mata Kuliah</option>
                    @foreach ($mata_kuliah as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Select Matakuliah End --}}

            {{-- Input Tanggal Start --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input wire:model='tanggalInput' type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Pilih Tanggal">
                </div>
            </div>
            {{-- Input Tanggal End --}}

            {{-- Input Jam Start --}}
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label for="jam_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam
                        Mulai</label>
                    <select id="jam_mulai" wire:model='jamMulaiInput'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Pilih Jam Mulai</option>
                        @foreach ($jam as $item)
                            <option value="{{ $item['value'] }}">{{ $item['value'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="jam_berakhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam
                        Berakhir</label>
                    <select id="jam_berakhir" wire:model='jamBerakhirInput'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Pilih Jam Berakhir</option>
                        @foreach ($jam as $item)
                            <option value="{{ $item['value'] }}">{{ $item['value'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Input Jam End --}}

            <div class="mt-2">
                <button type="submit" wire:loading.remove
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajukan</button>

                <button disabled type="button" wire:loading
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                    <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor" />
                    </svg>
                    Loading...
                </button>
            </div>


        </form>
    </div>
</div>
