<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect('/home');
    }
    return back()->withErrors(['invalid-credentials' => 'Invalid credentials']);
});

Route::get('/home', function() {
    return view('home');
})->middleware('auth');
