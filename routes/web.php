<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'index']);
route::post('/', [RegisterController::class, 'Register']);
