<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
})->name('login');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'tryLogin')->name('try.login');

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'saveRegister')->name('save.register');

    Route::get('/logout', 'logout')->name('logout');
});
