<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SettingsController extends Controller
{
    public function users()
    {
        $users = User::select('id', 'name', 'email', 'isActive', 'isAdmin')->get();
        return view('admin.users', ['title' => 'Usuários', 'users' => $users]);
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
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->isAdmin = $isAdmin;
            $user->password = Hash::make($request->pass);
            $user->save();

            $response = [
                'status' => 200,
                'message' => 'Usuário criado com sucesso.'
            ];

            return $response;

        } catch (\Throwable $th) {

            $response = [
                'status' => 400,
                'message' => 'Usuário já existente.'
            ];

            return $response;
        }
    }

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);
        $user->isActive = 0;
        $user->save();
    }
}
