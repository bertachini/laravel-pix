<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\ClientAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('clients.get');
})->name('index')->middleware('auth');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'processLogin')->name('process.login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'processRegister')->name('process.register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(ClientAuthController::class)->group(function () {
    Route::get('client/login', 'showLoginForm')->name('client.login');
    Route::post('client/login', 'login')->name('process.client.login');
    Route::post('client/logout', 'logout')->name('client.logout')->middleware('auth:clients');
});

Route::middleware('auth:clients')->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
});

Route::middleware(['admin'])->group(function () {
    Route::controller(TransactionsController::class)->group(function () {
        Route::get('/transactions', 'getTransaction')->name('transactions.get');
        Route::get('/transactions/new', 'newTransaction')->name('transactions.new');
        Route::post('/transactions/new', 'saveTransaction')->name('transactions.save');
        Route::get('/transactions/{id}', 'getTransactionById')->name('transactions.getById');
        Route::get('/transactions/{id}/edit', 'editTransaction')->name('transactions.edit');
        Route::patch('/transactions/{id}', 'updateTransaction')->name('transactions.update');
        Route::delete('/transactions/{id}', 'deleteTransaction')->name('transactions.delete');
    });

    Route::controller(CompanyController::class)->middleware('admin')->group(function () {
        Route::get('/company', 'getPartnerCompany')->name('company.get');
        Route::get('/company/new', 'newPartnerCompany')->name('company.new');
        Route::post('/company/new', 'savePartnerCompany')->name('company.save');
        Route::get('/company/{id}/edit', 'editPartnerCompany')->name('company.edit');
        Route::patch('/company/{id}', 'updatePartnerCompany')->name('company.update');
        Route::delete('/company/{id}', 'deletePartnerCompany')->name('company.delete');
    });

    Route::controller(CityController::class)->group(function () {
        Route::get('/cities', 'index')->name('cities.get');
        Route::get('/cities/new', 'newCity')->name('cities.new');
        Route::post('/cities', 'saveCity')->name('cities.save');
        Route::get('/cities/{id}/edit', 'editCity')->name('cities.edit');
        Route::put('/cities/{id}', 'updateCity')->name('cities.update');
        Route::delete('/cities/{id}', 'deleteCity')->name('cities.delete');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::get('/clients', 'clients')->name('clients.get');
        Route::get('/clients/new', 'newClient')->name('clients.new');
        Route::post('/clients/new', 'saveClient')->name('clients.save');
        Route::get('/clients/{id}/edit', 'editClient')->name('clients.edit');
        Route::patch('/clients/{id}', 'updateClient')->name('clients.update');
        Route::delete('/clients/{id}', 'destroyClient')->name('clients.destroy');
    });

    Route::controller(StatusController::class)->group(function () {
        Route::get('/status', 'getStatus')->name('status.get');
        Route::get('/status/new', 'newStatus')->name('status.new');
        Route::post('/status/new', 'saveStatus')->name('status.save');
        Route::get('/status/{id}/edit', 'editStatus')->name('status.edit'); // Added
        Route::patch('/status/{id}', 'updateStatus')->name('status.update'); // Added
        Route::delete('/status/{id}', 'deleteStatus')->name('status.delete'); // Added
    });
});
