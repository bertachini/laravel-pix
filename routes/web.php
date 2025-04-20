<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionsController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'tryLogin')->name('try.login');

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'saveRegister')->name('save.register');

    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(TransactionsController::class)->group(function () {
    Route::get('/transactions/new', 'newTransiction')->name('transactions.new');
    Route::post('/transactions/new', 'saveTransiction')->name('transactions.save');
    Route::get('/transactions', 'getTransiction')->name('transactions.get');
   
});