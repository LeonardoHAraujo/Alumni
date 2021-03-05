<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function students() {
        return view('pages.students');
    }

    public function admin() {
        return view('admin.panel-admin');
    }

    public function autenticate(Request $req) {

        $user = User::where('email', $req->username)->first();

        if(Hash::check($req->pass, $user->password)) {
            Auth::attempt(['email' => $req->username, 'password' => $req->pass]);

            if($user->isAdmin === 1) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('students');
            }
        } else {

            return redirect()->route('login')->with('error', 'Email ou senha incorretos.');

        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
