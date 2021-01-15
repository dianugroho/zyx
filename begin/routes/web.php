<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'auth.email.verified', 'auth.user.role'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth.email.verified'])->group(function () {
    Route::get('/route-1', function () {
        return 'Route 1';
    });

    Route::get('/route-2', function () {
        return 'Route 2';
    })->middleware(['auth.user.role']);
});

require __DIR__ . '/auth.php';
