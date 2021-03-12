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

    public function create(Request $request)
    {
        if (
            !isset($request->name) || $request->name == '' ||
            !isset($request->lastName) || $request->lastName == '' ||
            !isset($request->company) || $request->company == '' ||
            !isset($request->linkedin) || $request->linkedin == '' ||
            !isset($request->formation) || $request->formation == '' ||
            !isset($request->contactPoint) || $request->contactPoint == '' ||
            !isset($request->dateFirstContact) || $request->dateFirstContact == '' ||
            !isset($request->cell) || $request->cell == '' ||
            !isset($request->telephone) || $request->telephone == '' ||
            !isset($request->email) || $request->email == '' ||
            !isset($request->emailSecondary) || $request->emailSecondary == '' ||
            !isset($request->city) || $request->city == '' ||
            !isset($request->state) || $request->state == '' ||
            !isset($request->country) || $request->country == ''
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
            $lead->city = $request->city;
            $lead->state = $request->state;
            $lead->country = $request->country;
            $lead->save();
            

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
            !isset($request->company) || $request->company == '' ||
            !isset($request->linkedin) || $request->linkedin == '' ||
            !isset($request->formation) || $request->formation == '' ||
            !isset($request->contactPoint) || $request->contactPoint == '' ||
            !isset($request->dateFirstContact) || $request->dateFirstContact == '' ||
            !isset($request->cell) || $request->cell == '' ||
            !isset($request->telephone) || $request->telephone == '' ||
            !isset($request->email) || $request->email == '' ||
            !isset($request->emailSecondary) || $request->emailSecondary == '' ||
            !isset($request->city) || $request->city == '' ||
            !isset($request->state) || $request->state == '' ||
            !isset($request->country) || $request->country == ''
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
            $lead->city = $request->city;
            $lead->state = $request->state;
            $lead->country = $request->country;
            $lead->save();
            

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