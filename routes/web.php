<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('dealerships/{dealership}', \App\Livewire\Dealership\Show::class)
    ->middleware(['auth', 'verified'])
    ->name('dealership.show');

Route::get('dealerships/{dealership}/stores', \App\Livewire\Dealership\StoreIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('dealership.stores');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
