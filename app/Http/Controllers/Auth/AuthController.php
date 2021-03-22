<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MfaMail;
use App\Models\User;
use App\Models\Mfa;
use Keygen\Keygen;

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

                    try {

                        // POPULATE DATA IN TABLE MFA..
                        /*$mfa = new Mfa();
                        $mfa->userId = $user->id;
                        $mfa->hash = Keygen::alphanum(9)->generate();
                        $mfa->save();*/

                        // SEND MAIL HERE..
                        # return new MfaMail($user, '123456');
                        mail::send(new MfaMail($user, '123456'));

                        // RETURN VIEW MFA..
                        return view('mfa.mfa');

                    } catch (Exception $e) {
                        return $e->getMessage();
                    }


                    /*Auth::attempt(['email' => $req->username, 'password' => $pass]);
        
                    if($user->isAdmin === 1) {
                        return redirect()->route('admin');
                    } else {
                        return redirect()->route('students');
                    }*/
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
