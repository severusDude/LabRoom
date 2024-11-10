<?php

use App\Livewire\ShowDataLab;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('admin/kelola-laboratorium/detail/{id}', ShowDataLab::class)->name('data.lab.show');

require __DIR__.'/auth.php';
