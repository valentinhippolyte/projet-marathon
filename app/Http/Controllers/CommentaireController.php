<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'commentaire' => 'required',
                'note' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $commentaires = new Commentaire();
        $time = Carbon::now();

        $commentaires->commentaire = $request->commentaire;
        $commentaires->date_com = $time;
        $commentaires->note = $request->note;
        $commentaires->user_id = Auth()->id();
        $commentaires->jeu_id = $request->jeu_id;

        // insertion de l'enregistrement dans la base de données
        $commentaires->save();

        // redirection vers la page qui affiche la liste des tâches
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $commentaire = Commentaire::all()->find($id);
        $commentaire->delete();
        return back();
    }
}
