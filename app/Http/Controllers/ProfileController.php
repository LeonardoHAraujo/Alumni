<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Keygen\Keygen;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.profile', ['title' => 'Perfil']);
    }

    public function update(Request $request)
    {
        if (
            $request->id == '' ||
            $request->name == '' ||
            $request->lastName == '' ||
            $request->email == '' ||
            $request->currentPass == '' ||
            $request->newPass == '' ||
            $request->confirmPass == '' 
        ) {
            return redirect()->back()->with('messageError', 'Preencha todos os campos corretamente.');
        }

        if($request->newPass !== $request->confirmPass) {
            return redirect()->back()->with('messageError', 'As senhas não correspondem.');
        }
        
        $user = User::find($request->id);

        if(Hash::check($request->currentPass.$user->salt, $user->password)) {
            try {

                $salt = Keygen::bytes(50)->hex()->generate();

                $user->name = $request->name;
                $user->lastName = $request->lastName;
                $user->email = $request->email;
                $user->password = Hash::make($request->confirmPass.$salt);
                $user->salt = $salt;
                $user->save();

                return redirect()->back()->with('messageSuccess', 'Perfil atualizado com sucesso.');

            } catch (\Throwable $th) {
                return redirect()->back()->with('messageError', 'Ops! Algo deu errado, contate o administrador.');
            }
        } else {
            return redirect()->back()->with('messageError', 'Senha atual incorreta.');
        }
    }
}
