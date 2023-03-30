<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Itineraire;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('acceuil');
    }
    public function apropos()
    {
        return view('pages.apropos');
    }
    public function administration()
    {
        $regions = Region::all();
        $departements = Departement::all();
        $itineraires = Itineraire::all();
        $users = User::all();
        return view('admin',['regions'=>$regions,'departements'=>$departements,'itineraires'=>$itineraires,'users'=>$users]);
    }
    public function enregistrement(Request $request)
    {
        $itineraire = new Itineraire();
        $itineraire->depart_id = $request->ville_depart;
        $itineraire->arrivee_id = $request->ville_arrivee;
        $itineraire->distance = $request->distance;
        $itineraire->tarif = $request->distance*500;
        $itineraire->save();
        return redirect('/administration');
    }
}
