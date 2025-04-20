<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

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
            session()->put('username',Auth::user()->name);
            return redirect(route('dashboard'));
        }


        session()->flash('mensagem', [
            'type' => 'danger',
            'message' => 'Email ou senha inválidos']);
    }

    public function register()
    {
        return view('auth.register');

    }

    public function saveRegister(AuthRequest $req)
    {

        $user = User::where('email', $req->email)->first();
        if($user) {
            return redirect()
                ->back()
                ->with('notify', [
                    'type' => 'warning',
                    'message' => 'Este email já está cadastrado'
                ]);
        }

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->senha;
        $user->save();

        return redirect()
            ->route('login')
            ->with('notify', [
                'type' => 'success',
                'message' => 'Usuário cadastrado com sucesso!'
            ]);

        
    }

    public function logout() {}
}
