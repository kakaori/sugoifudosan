<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PartnerProfileController as ControllersPartnerProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PropertiesController::class, 'welcome'])->name('welcome');

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

Route::get('/search', [PropertiesController::class, 'index'])->name('properties.index');
Route::get('/types/{slug}', [PropertiesController::class, 'types'])->name('properties.types');
Route::get('/prefectures/{slug}', [PropertiesController::class, 'prefectures'])->name('properties.prefectures');
//Route::get('/prefectures/{slug}/{city}', [PropertiesController::class, 'city'])->name('properties.city'); // 新しいアクションを追加
Route::get('/properties/{id}', [PropertiesController::class, 'show'])->name('properties.show');

Route::get('/inquiry/form/{id}', [InquiryController::class, 'form'])->name('inquiry.form');
Route::get('/inquiry/complete/{id}', [InquiryController::class, 'complete'])->name('inquiry.complete');

require __DIR__.'/auth.php';
require __DIR__.'/partner.php';
