<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Keygen\Keygen;

class SettingsController extends Controller
{
    public function users()
    {
        $users = User::select('id', 'name', 'lastName', 'email', 'isActive', 'isAdmin')->get();
        return view('admin.settings.users', ['title' => 'Usuários', 'users' => $users]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'pass' => 'required',
            'confirmPass' => 'required',
        ]);

        if ($request->pass !== $request->confirmPass) {
            die();
        }

        $isAdmin = isset($request->func) ? 1 : 0;

        try {

            $salt = Keygen::bytes(50)->hex()->generate();
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->isAdmin = $isAdmin;
            $user->password = Hash::make($request->pass.$salt);
            $user->salt = $salt;
            $user->save();

            $response = [
                'status' => 200,
                'message' => 'Usuário criado com sucesso.'
            ];

            return $response;

        } catch (Exception $e) {

            $response = [
                'status' => 400,
                'message' => 'Usuário já existente.'
            ];

            return $response;
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'pass' => 'required',
            'confirmPass' => 'required',
        ]);

        if ($request->pass !== $request->confirmPass) {
            die();
        }

        $isAdmin = isset($request->func) ? 1 : 0;

        try {

            $salt = Keygen::bytes(50)->hex()->generate();
            
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->isAdmin = $isAdmin;
            $user->password = Hash::make($request->pass.$salt);
            $user->salt = $salt;
            $user->save();

            $response = [
                'status' => 200,
                'message' => 'Usuário atualizado com sucesso.'
            ];

            return $response;

        } catch (Exception $e) {

            $response = [
                'status' => 400,
                'message' => 'Usuário já existente.'
            ];

            return $response;
        }
    }

    public function delete(Request $request) 
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);
        $user->isActive = 0;
        $user->save();
    }

    public function deletedUsers()
    {
        $users = User::select('id', 'name', 'lastName', 'email', 'isActive', 'isAdmin')->get();
        return view('admin.settings.deletedUsers', ['title' => 'Usuários deletados', 'users' => $users]);
    }

    public function updateReactivateUser(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $user = User::find($request->id);
        $user->isActive = 1;
        $user->save();
    }
}
