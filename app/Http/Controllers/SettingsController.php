<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SettingsController extends Controller
{
    public function users()
    {
        $users = User::select('id', 'name', 'email', 'isAdmin')->get();
        return view('admin.users', ['title' => 'Usuários', 'users' => $users]);
    }
}
