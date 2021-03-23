<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\MfaMail;
use App\Models\User;
use App\Models\Mfa;
use Keygen\Keygen;
use \DateTime;
use Validator;

class AuthController extends Controller
{
    public function viewMfa($userId)
    {
        return view('mfa.mfa', ['id' => $userId]);
    }

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
                        $mfa = Mfa::where('userId', $user->id)->first();
                        $now = new DateTime('NOW');

                        if($mfa) {
                            $mfa->hash = Keygen::alphanum(9)->generate();
                            $mfa->isUsed = 0;
                            $mfa->createdAt = $now->format('Y-m-d H:i:s');
                            $mfa->save();
                        } else {
                            $mfa = new Mfa();
                            $mfa->userId = $user->id;
                            $mfa->hash = Keygen::alphanum(9)->generate();
                            $mfa->createdAt = $now->format('Y-m-d H:i:s');
                            $mfa->save();
                        }

                        // SEND MAIL HERE..
                        Mail::send(new MfaMail($user, $mfa->hash));

                        // RETURN VIEW MFA..
                        return redirect("/mfa/{$user->id}");

                    } catch (Exception $e) {
                        return $e->getMessage();
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

    public function validateMfaCode(Request $request)
    {
        if($request->code == '' || !isset($request->code)) {
            return redirect("/mfa/{$request->userId}")->with('errorCode', 'Preencha o código corretamente.');
        } elseif($request->userId == '' || !isset($request->userId)) {
            return redirect("/mfa/1")->with('errorCode', 'Ops! Algo deu errado, contate o administrador.');
        }


        try {

            $mfaOfUser = DB::table('mfas')->where('userId', $request->userId)->get();

            # Check if $ request-> code is equal to $ mfaOfUser-> hash
            # Check if $ mfaOfUser-> isUsed is equal to 0
            if($request->code == $mfaOfUser[0]->hash && $mfaOfUser[0]->isUsed == 0) {

                # Check if the interval between $ mfaOfUser-> createdAt and the current moment is less than or equal to 10
                $now = new DateTime('NOW');
                $dateOfCreateMfaCode = new DateTime($mfaOfUser[0]->createdAt);
                $interval = $dateOfCreateMfaCode->diff(new DateTime($now->format('Y-m-d H:i:s')));

                $minutes = $interval->days * 24 * 60;
                $minutes += $interval->h * 60;
                $minutes += $interval->i;

                if($minutes <= 10) {

                    $mfa = Mfa::where('userId', $request->userId)->first();
                    $mfa->isUsed = 1;
                    $mfa->save();

                    $user = User::find($request->userId)->first();
                    Auth::login($user);
        
                    if($user->isAdmin === 1) {
                        return redirect()->route('admin');
                    } else {
                        return redirect()->route('students');
                    }
                } else {
                    return redirect("/mfa/{$request->userId}")->with('errorCode', 'O código expirou.');
                }
            } else {
                return redirect("/mfa/{$request->userId}")->with('errorCode', 'Código inválido.');
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
