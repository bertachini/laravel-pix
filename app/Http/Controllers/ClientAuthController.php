<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.client_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('clients')->attempt($credentials)) {
            $request->session()->regenerate();
            $client = Auth::guard('clients')->user();
            session([
                'user_id' => $client->id,
                'username' => $client->name,
                'user_type' => 'client',
            ]);
            return redirect()->intended('/client/dashboard')->with('success', 'Bem-vindo, ' . $client->name . '!');
}

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('clients')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/client/login')->with('success', 'Logged out successfully.');
    }
}
