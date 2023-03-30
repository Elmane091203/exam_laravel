<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    //
    public function index()
    {
        return view('pages.chauffeur');
    }
    public function form()
    {
        return view('chauffeur.form');
    }
}
