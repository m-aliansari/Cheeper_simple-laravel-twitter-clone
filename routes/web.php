<?php

use App\Http\Controllers\CheepController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CheepController::class, 'index']);
Route::post('/cheeps', [CheepController::class, 'store']);
Route::get('/cheeps/{cheep}/edit', [CheepController::class, 'edit']);
Route::put('/cheeps/{cheep}', [CheepController::class, 'update']);
Route::delete('/cheeps/{cheep}', [CheepController::class, 'destroy']);

// we can do this too
// Route::resource('/cheeps', CheepController::class)
//     ->only(['store', 'edit', 'update', 'destroy']);
