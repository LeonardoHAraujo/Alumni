<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function students() 
    {
        return view('pages.students');
    }

    public function admin() 
    {
        return view('admin.panel-admin', ['title' => 'Dashboard']);
    }
}
