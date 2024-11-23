<?php

use App\Filament\Resources\LabResource\Pages\LabDetails;

use App\Livewire\Pages\User\Home;
use App\Livewire\Pages\User\LabDetail;
use App\Livewire\Pages\User\LoanUser;

use App\Livewire\ShowDataLab;
use Illuminate\Support\Facades\Route;

// redirect
Route::redirect("/", 'user/home');

Route::middleware(["auth", 'verified'])->group(function () {
    // bawaan
    Route::view('dashboard', 'dashboard')->name("dashboard");
    Route::view('profile', 'profile')->name("profile");

    Route::get("user/loan", LoanUser::class)->name("user.loan");
    Route::get("user/home", Home::class)->name("user.home");
    Route::get("lab/{slug}", LabDetail::class);
});


Route::get('admin/kelola-laboratorium/detail/{id}', ShowDataLab::class)->name('data.lab.show');



// Route::view('/', 'welcome')
//     ->middleware(['auth', 'verified']);

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

// Route::get("user/loan", LoanUser::class)
//     ->middleware(['auth', 'verified'])
//     ->name("user.loan");

// Route::get('admin/kelola-laboratorium/detail/{id}', ShowDataLab::class)->name('data.lab.show');

require __DIR__ . '/auth.php';
