<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::get('/', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/espera', function () {
    return view('esperaverificacion');
})->name('espera');

Route::get('/verify-email/{token}', [RegisterController::class, 'verifyEmail'])->name('verify.email');

?>
=======
route::get('/', [LoginController::class, 'index']);
route::post('/register', [RegisterController::class, 'Register']);
route::post('/login', [LoginController::class, 'login']);
route::get('/home', function(){
    return view('welcome');
});
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

