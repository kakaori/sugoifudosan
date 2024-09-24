<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth:partner'])->group(function () { 
    Route::get('/partner/profile', [ProfileController::class, 'edit'])->name('partner.profile.edit');
    Route::patch('/partner/profile', [ProfileController::class, 'update'])->name('partner.profile.update');
    Route::delete('/partner/profile', [ProfileController::class, 'destroy'])->name('partner.profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/partner.php';