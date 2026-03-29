<?php

use App\Http\Controllers\CheepController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CheepController::class, 'index']);
