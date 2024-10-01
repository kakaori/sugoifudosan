<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\InquiryController;
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

Route::get('/search', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/types/{物件種別}', [PropertyController::class, 'types'])->name('properties.types');
Route::get('/prefectures/{都道府県}', [PropertyController::class, 'prefectures'])->name('properties.prefectures');
Route::get('/prefectures/{都道府県}/{市区町村}', [PropertyController::class, 'city'])->name('properties.city'); // 新しいアクションを追加
Route::get('/properties/{物件ID}', [PropertyController::class, 'show'])->name('properties.show');

Route::get('/inquiry/form/{物件ID}', [InquiryController::class, 'form'])->name('inquiry.form');
Route::get('/inquiry/complete/{物件ID}', [InquiryController::class, 'complete'])->name('inquiry.complete');

require __DIR__.'/auth.php';
require __DIR__.'/partner.php';