<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegenerateOtpController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Profile\GetProfileController;
use App\Http\Controllers\Profile\UpdateProfileController;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterController::class);
Route::put('verification', VerificationController::class);
Route::put('regenerate-otp', RegenerateOtpController::class);
Route::put('update-password', UpdatePasswordController::class);
Route::post('login', LoginController::class);

Route::middleware(['auth.jwt'])->group(function () {
    Route::get('/profile/get-profile', GetProfileController::class);
    Route::post('/profile/update-profile', UpdateProfileController::class);
});
