<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Commentaire::all();
        return view('pages.Commentaire',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layoutsC.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "nom"=>["required", "min:1", "max:200"],
            "prenom"=>["required", "min:1", "max:200"],
            "dateDePublication"=>["required", "min:1", "max:200"],
            "contenu"=>["required", "min:1", "max:200"],
            "video_id"=>["required", "min:1", "max:200"],
        ]);
        $data = new Commentaire;
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->dateDePublication = $request->dateDePublication;
        $data->contenu = $request->contenu;
        $data->video_id = $request->video_id;
        $data->save();
      
        return redirect()->route('commentaires.index');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $Commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        $data = $commentaire;
        return view('layoutsC.show',compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $Commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        
        return view('layoutsC.edit',compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        request()->validate([
            "nom"=>["required", "min:1", "max:200"],
            "prenom"=>["required", "min:1", "max:200"],
            "dateDePublication"=>["required", "min:1", "max:200"],
            "contenu"=>["required", "min:1", "max:200"],
            "video_id"=>["required", "min:1", "max:200"],
        ]);
        
        $commentaire->nom = $request->nom;
        $commentaire->prenom = $request->prenom;
        $commentaire->dateDePublication = $request->dateDePublication;
        $commentaire->contenu = $request->contenu;
        $commentaire->video_id = $request->video_id;
        $commentaire->save();
      
        return redirect()->route('commentaires.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        

        $commentaire->delete();
        return redirect()->route('videos.index');
    }
}
