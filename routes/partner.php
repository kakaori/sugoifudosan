<?php

use App\Http\Controllers\Partner\AuthenticatedSessionController;
use App\Http\Controllers\Partner\ConfirmablePasswordController;
use App\Http\Controllers\Partner\EmailVerificationNotificationController;
use App\Http\Controllers\Partner\EmailVerificationPromptController;
use App\Http\Controllers\Partner\NewPasswordController;
use App\Http\Controllers\Partner\PasswordController;
use App\Http\Controllers\Partner\PasswordResetLinkController;
use App\Http\Controllers\Partner\RegisteredUserController;
use App\Http\Controllers\Partner\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'partner'], function () {
    // 登録
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('partner.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    // ログイン
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('partner.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('partner.password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('partner.password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('partner.password.store');
    
    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:partner'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn() => view('partner.dashboard'))
            ->name('partner.dashboard');
    });

});

Route::group(['prefix' => 'partner'], function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('partner.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('partner.verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('partner.verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('partner.password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('partner.password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('partner.logout');
});
