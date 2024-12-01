<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Validation\ValidationException;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate(
            [
                'form.email' => 'required|email',
                'form.password' => 'required|min:6',
            ],
            [
                // Custom messages
                'form.email.required' => 'Email wajib diisi.',
                'form.email.email' => 'Format email tidak valid.',
                'form.password.required' => 'Password wajib diisi.',
                'form.password.min' => 'Password harus memiliki minimal :min karakter.',
            ],
        );

        if (!Auth::attempt(['email' => $this->form->email, 'password' => $this->form->password])) {
            throw ValidationException::withMessages([
                'form.email' => 'Email atau password yang Anda masukkan salah.',
            ]);
        }

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('user.home', absolute: false), navigate: true);
    }
}; ?>

<div class="bg-[#E6E6E6] lg:px-0 px-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <nav class="hidden w-[314px] min-h-screen bg-primary-800 px-[50px] pt-[25px] lg:flex flex-col fixed">
        <div>
            <h1 class="text-[40px] text-white mx-auto">LAB-ROOM</h1>
        </div>
    </nav>


    <div class="lg:ml-[314px] min-h-screen flex items-center justify-center">
        <div class="w-full sm:max-w-lg ">
            <h1 class="my-8 text-3xl font-bold tracking-tighter text-center">Masuk</h1>
            <form wire:submit="login">
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
                        name="email" autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                        name="password" autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>

                <div class="flex flex-col items-end justify-end mt-4 space-y-2">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}" wire:navigate>
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <x-primary-button class="">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
