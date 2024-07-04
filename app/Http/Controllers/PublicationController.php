<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;
use App\Models\Profil;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::orderBy('created_at', 'desc')->with(['comments.profil'])->get();
        //  dd($publication);
        return view('Publication.index', compact($publications, 'publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        //return dd($tags);
        return view('Publication.create', compact('tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Valider les données de la requête entrante
        $validatedData = $request->validate([
            'titre' => 'required|min:3',
            'text' => 'required|min:5',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Facultatif mais doit être valide si présent
            'tags' => 'nullable|array'
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/publication');
            // Utiliser Storage::url pour obtenir l'URL accessible de l'image
            $validatedData['image'] = Storage::url($path);
        }


        $validatedData['profil_id'] = Auth::id();
        $publication = Publication::create($validatedData);
        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
                $publication->tags()->create(['description' => $tag]);
            }
        }
        return redirect()->route('Publication.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publication::find($id);
        return view('Publication.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::find($id);
        return view('Publication.edit', compact($publication, 'publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pub = Publication::findOrFail($id);


        $validatedData = $request->validate([
            'titre' => 'required|min:3',
            'text' => 'required|min:5',
            'image' => 'image|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('public/profil');

            $validatedData['image'] = Storage::url($path);
        }
        if ($request->has('delete_image')) {
            $validatedData['image'] = null;
        }

        $pub->update($validatedData);


        return redirect()->route('Publication.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pub = Publication::findOrFail($id);
        $pub->delete($pub);
        return redirect()->route('Publication.index');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Requête pour rechercher les publications

        $publications = Publication::where('titre', 'like', '%' . $query . '%')
            ->orWhere('text', 'like', '%' . $query . '%')
            ->orWhereHas('tags', function ($queryBuilder) use ($query) {
                $queryBuilder->where('description', 'like', '%' . $query . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();
        if ($publications->isEmpty()) {
            return view('Publication.index', ['publications' => $publications])->with('message', 'Aucune publication trouvée.');
        }
        return view('Publication.index', compact('publications'));
    }
}
