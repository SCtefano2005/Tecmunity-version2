<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::get('/', [RegisterController::class, 'index']);
route::get('/', [LoginController::class, 'index']);
route::post('/register', [RegisterController::class, 'Register']);
route::post('/login', [LoginController::class, 'login']);
route::get('/home', function(){
    return view('welcome');
route::get('/hola', function(){
    return 'jodsaj';
});
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});