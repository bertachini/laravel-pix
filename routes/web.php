<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CityController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'processLogin')->name('process.login');

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'processRegister')->name('process.register');

    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(TransactionsController::class)->group(function () {
    Route::get('/transactions/new', 'newTransiction')->name('transactions.new');
    Route::post('/transactions/new', 'saveTransiction')->name('transactions.save');
    Route::get('/transactions', 'getTransiction')->name('transactions.get');
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('/company/new', 'newPartnerCompany')->name('company.new');
    Route::post('/company/new', 'savePartnerCompany')->name('company.save');
    Route::get('/company', 'getPartnerCompany')->name('company.get');
});


Route::controller(CityController::class)->group(function () {
    Route::get('/cities', 'index')->name('cities.get');
    Route::get('/cities/new', 'newCity')->name('cities.new');
    Route::post('/cities/new', 'saveCity')->name('cities.save');
});

