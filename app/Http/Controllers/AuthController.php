<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');

    }

    public function tryLogin(Request $req)
    {

        $credenciais = ['email' => $req->email, 'password' => $req->senha];

        if(Auth::attempt($credenciais)) {
            return redirect(route('home'));
        }

        session()->flash('mensagem', 'Credenciais invalidas');
    }

    public function register()
    {
        return view('auth.register');

    }

    public function saveRegister(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->senha;
        $user->save();

        session()->flash('message', [
            'type' => 'success',
            'text' => 'Usuário registrado com sucesso!'
        ]);

        return redirect(route('login'));
    }

    public function logout() {}
}
