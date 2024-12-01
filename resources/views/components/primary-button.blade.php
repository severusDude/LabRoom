<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2 bg-primary-800 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-primary-800/70 focus:bg-primary-800/70 active:bg-primary-800/90 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
