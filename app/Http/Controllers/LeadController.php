<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leads;
use App\Models\Locale;

class LeadController extends Controller
{
    public function index()
    {
        $leads = DB::table('leads')
            ->join('locales', 'leads.id', '=', 'locales.leadId')
            ->select('leads.*', 'locales.street', 'locales.number', 'locales.city', 'locales.state', 'locales.country')
            ->get();

        return view('admin.leads.leads', ['title' => 'Leads', 'leads' => $leads]);
    }

    public function create(Request $request)
    {
        if (
            !isset($request->name) || $request->name == '' ||
            !isset($request->lastName) || $request->lastName == '' ||
            !isset($request->cell) || $request->cell == '' ||
            !isset($request->email) || $request->email == ''
        ) {
            $response = [
                'status' => 400,
                'message' => 'Ops! Algo deu errado, contate o administrador.'
            ];

            return $response;
        }

        try {
            
            $lead = new Leads();
            $lead->name = $request->name;
            $lead->lastName = $request->lastName;
            $lead->company = $request->company;
            $lead->linkedin = $request->linkedin;
            $lead->formation = $request->formation;
            $lead->contactPoint = $request->contactPoint;
            $lead->dateFirstContact = $request->dateFirstContact;
            $lead->cell = $request->cell;
            $lead->telephone = $request->telephone;
            $lead->email = $request->email;
            $lead->emailSecondary = $request->emailSecondary;
            $lead->save();

            DB::table('locales')
              ->insert([
                'leadId' => $lead->id,
                'street' => $request->street,
                'number' => $request->number,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country
              ]);

            $response = [
                'status' => 200,
                'message' => 'Lead criado com sucesso.'
            ];

            return $response;

        } catch (\Exception $e) {

            $response = [
                'status' => 400,
                'message' => 'Registro já Existente.'
            ];

            return $response;
        }
    }

    public function update(Request $request)
    {
        if (
            !isset($request->id) || $request->id == '' ||
            !isset($request->name) || $request->name == '' ||
            !isset($request->lastName) || $request->lastName == '' ||
            !isset($request->cell) || $request->cell == '' ||
            !isset($request->email) || $request->email == '' 
        ) {
            $response = [
                'status' => 400,
                'message' => 'Ops! Algo deu errado, contate o administrador.'
            ];

            return $response;
        }

        try {
                        
            $lead = Leads::find($request->id);
            $lead->name = $request->name;
            $lead->lastName = $request->lastName;
            $lead->company = $request->company;
            $lead->linkedin = $request->linkedin;
            $lead->formation = $request->formation;
            $lead->contactPoint = $request->contactPoint;
            $lead->dateFirstContact = $request->dateFirstContact;
            $lead->cell = $request->cell;
            $lead->telephone = $request->telephone;
            $lead->email = $request->email;
            $lead->emailSecondary = $request->emailSecondary;
            $lead->save();

            DB::table('locales')
              ->where('leadId', $request->id)
              ->update([
                'street' => $request->street,
                'number' => $request->number,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country
              ]);

            $response = [
                'status' => 200,
                'message' => 'Lead atualizado com sucesso.'
            ];

            return $response;

        } catch (\Exception $e) {

            $response = [
                'status' => 400,
                'message' => 'Registro já Existente.'
            ];

            return $response;
        }
    }

    public function delete(Request $request)
    {
        if (!isset($request->id) || $request->id == '') {
            $response = [
                'status' => 400,
                'message' => 'Ops! Algo deu errado, contate o administrador.'
            ];

            return $response;
        }

        $lead = Leads::find($request->id);
        $lead->isActive = 0;
        $lead->save();
    }
}