<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Leads::all();
        return view('admin.leads.leads', ['title' => 'Leads', 'leads' => $leads]);
    }
}