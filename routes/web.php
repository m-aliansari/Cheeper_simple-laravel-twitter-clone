<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\CheepController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CheepController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::post('/cheeps', [CheepController::class, 'store']);
    Route::get('/cheeps/{cheep}/edit', [CheepController::class, 'edit']);
    Route::put('/cheeps/{cheep}', [CheepController::class, 'update']);
    Route::delete('/cheeps/{cheep}', [CheepController::class, 'destroy']);
});

// we can do this too
// Route::resource('/cheeps', CheepController::class)
//     ->only(['store', 'edit', 'update', 'destroy']);



// REGISTER ROUTES
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
Route::post('/register', Register::class)
    ->middleware('guest');



// LOGOUT
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');



// LOGIN
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('/login', Login::class)
    ->middleware('guest');
