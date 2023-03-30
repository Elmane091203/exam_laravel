<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class ClientController extends Controller
{
    //
    public function index()
    {
        return view('pages.passagers');
    }
    public function form()
    {
        return view('passager.form',['clients'=>User::all()]);
    }
    public function store(Request $request)
    {
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->attachRole('client');
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
