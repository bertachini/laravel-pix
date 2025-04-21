<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');

    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('notify', [
                'type' => 'success',
                'message' => 'Bem-vindo, ' . Auth::user()->name . '!',
            ]);
        }

        return back()->with('notify', [
            'type' => 'danger',
            'message' => 'Email ou senha inválidos',
        ]);
    }

    public function register()
    {
        return view('auth.register');

    }

    public function processRegister(AuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'normal',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('notify', [
            'type' => 'success',
            'message' => 'Cadastro realizado com sucesso, bem-vindo!',
        ]);
    }

    public function logout() {}
}
