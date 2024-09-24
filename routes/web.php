<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\PartnerProfileController;
use App\Http\Controllers\PartnerProfileController as ControllersPartnerProfileController;

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
    Route::get('/partner/profile', [ControllersPartnerProfileController::class, 'edit'])->name('partner.profile.edit');
    Route::patch('/partner/profile', [ControllersPartnerProfileController::class, 'update'])->name('partner.profile.update');
    Route::delete('/partner/profile', [ControllersPartnerProfileController::class, 'destroy'])->name('partner.profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/partner.php';