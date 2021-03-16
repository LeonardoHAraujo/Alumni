<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function autenticate(Request $req) 
    {
        if (
            $req->username == '' ||
            $req->pass == ''
        ) {
            return redirect()->route('login')->with('error', 'Preencha os campos corretamente.');
        }

        $user = User::where('email', $req->username)->first();

        if($user) {
            if($user->isActive === 1) {
                $pass = $req->pass.$user->salt;
                
                if(Hash::check($pass, $user->password)) {
                    Auth::attempt(['email' => $req->username, 'password' => $pass]);
        
                    if($user->isAdmin === 1) {
                        return redirect()->route('admin');
                    } else {
                        return redirect()->route('students');
                    }
                } else {
                    return redirect()->route('login')->with('error', 'Email ou senha incorretos.');
                }
            } else {
                return redirect()->route('login')->with('error', 'Usuário inexistente.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email ou senha incorretos.');
        }
    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
