<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leads;
use App\Models\User;

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
        $countUser = DB::table('users')->where('isActive', 1)->count();
        $countUserDeleted = DB::table('users')->where('isActive', 0)->count();
        $countLeads = DB::table('leads')->where('isActive', 1)->count();

        $usersLimit5 = DB::table('users')->where('isActive', 1)->limit(5)->get();
        $leadsLimit5 = DB::table('leads')
            ->join('locales', 'leads.id', '=', 'locales.leadId')
            ->select('leads.*', 'locales.street', 'locales.number', 'locales.city', 'locales.state', 'locales.country')
            ->limit(5)
            ->get();

        return view('admin.panel-admin', [
            'title' => 'Dashboard', 

            'countUser' => $countUser, 
            'countUserDeleted' => $countUserDeleted,
            'countLeads' => $countLeads,

            'usersLimit5' => $usersLimit5,
            'leadsLimit5' => $leadsLimit5
        ]);
    }
}
