<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\AuthenticatedSessionController;
use App\Http\Controllers\Partner\RegisteredUserController;

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

/* 管理者用ルーティング */
Route::group(['prefix' => 'partner'], function () {
    // 登録
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('partner.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    // ログイン
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('partner.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:partner'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn() => view('partner.dashboard'))
            ->name('partner.dashboard');
    });
});

require __DIR__.'/auth.php';
