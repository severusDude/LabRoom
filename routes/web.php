<?php

use App\Livewire\Pages\User\Home;
use App\Livewire\Pages\User\LoanUser;

use App\Livewire\ShowDataLab;
use Illuminate\Support\Facades\Route;

// redirect
Route::redirect("/", 'user/home');

Route::middleware(["auth", 'verified'])->group(function () {
    // bawaan
    // Route::view('dashboard', 'dashboard')->name("dashboard");
    // Route::get("lab/{slug}", LabDetail::class);

    Route::view('profile', 'profile')->name("profile");
    Route::get("user/home", Home::class)->name("user.home");
    Route::get("user/loan", LoanUser::class)->name("user.loan");
    Route::get("user/loan/{id}", LoanUser::class);
});


Route::get('admin/kelola-laboratorium/detail/{id}', ShowDataLab::class)->name('data.lab.show');

require __DIR__ . '/auth.php';
