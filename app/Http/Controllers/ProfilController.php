<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Profil;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profils = Profil::paginate(12);
        return view('Profil.profil', compact('profils'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Profil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // Validation des données
        $validatedData = $req->validate([
            'nom' => 'required|min:3',
            'email' => 'required|email|unique:profils,email',
            'image' => 'image|mimes:jpg,png',
            'password' => 'required|min:4|confirmed'
        ]);
        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('public/profil');
            // Utiliser Storage::url pour obtenir l'URL accessible de l'image
            $validatedData['image'] = Storage::url($path);
        } else {
            // Utilisation d'un chemin par défaut pour l'image
            $validatedData['image'] = Storage::url('profil/téléchargement.jpg');
        }


        // Hachage du mot de passe
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Enregistrement du profil
        $profil = Profil::create($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('show')->with('success', 'Votre profil est ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = Profil::find($id);
        return view('Profil.show', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profils = Profil::find($id);
        return view('profil.edit', compact($profils, 'profils'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Profil $Profil)
    {
        // Validation des données
        $validatedData = $req->validate([
            'nom' => 'required|min:3',
            'email' => 'required|email',
            'image' => 'image|mimes:jpg,png',
            'password' => 'nullable|min:4|confirmed'
        ]);

        // Vérifier si le mot de passe a été fourni et s'il est valide
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']); // Supprimer le champ password du tableau
        }

        // Gestion de l'image
        if ($req->has('delete_image')) {
            // Utilisation d'un chemin par défaut pour l'image
            $validatedData['image'] = Storage::url('profil/téléchargement.jpg');
        } elseif ($req->hasFile('image')) {
            // Si l'utilisateur a téléchargé une nouvelle image
            $path = $req->file('image')->store('public/profil');
            // Utiliser Storage::url pour obtenir l'URL accessible de l'image
            $validatedData['image'] = Storage::url($path);
        }

        // Mettre à jour le profil avec les données validées
        $Profil->update($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('Profil.index')->with('success', 'Votre profil est mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Profil $Profil)
    {
        $Profil->delete();

        return redirect()->route('Profil.index')->with('success', 'Votre profil a été supprimé avec succès.');
    }
}
