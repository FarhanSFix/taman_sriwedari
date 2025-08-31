<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [DokumenController::class, 'index'])->name('welcome');

Route::get('/login', function () {
    return redirect('/admin');
})->name('admin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/user/profile', [UserProfileController::class, 'show'])
        ->name('profile.show');
});