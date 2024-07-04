<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('Acceuil.index');
    }


    public function login(Request $req)
    {
        $login = $req->email;
        $motdepass = $req->password;

        $credentials = ['email' => $login, 'password' => $motdepass];

        // Tentez maintenant l'authentification
        if (Auth::attempt($credentials)) {
            // Si l'authentification réussit, redirigez l'utilisateur
            return redirect()->route('Publication.index')->with('success', 'Vous êtes connecté avec succès.');
        } else {
            // Si l'authentification échoue, redirigez l'utilisateur avec un message d'erreur
            return back()->withErrors(['email' => 'Email ou mot de passe incorrect'])->withInput($req->only('email'));
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('show');
    }
}
