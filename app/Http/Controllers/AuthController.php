<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

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
            session(['user_id' => Auth::user()->id]);
            session(['username' => Auth::user()->name]);
            session(['user_type' => 'admin']);
            return redirect()->route('dashboard')->with('success', 'Bem-vindo, ' . Auth::user()->name . '!');
        }

        return back()->with('error', 'Email ou senha inválidos');
    }

    public function register()
    {
        return view('auth.register');

    }

    public function processRegister(RegisterRequest $request)
    {

        $validate = User::where('email', $request->email)->first();
        if ($validate) {
            return back()->with('error', 'Email já cadastrado');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'normal',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Cadastro realizado com sucesso, bem-vindo!');
    }

    public function logout(Request $request)
    {
      
   
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();



        return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
    }

}
