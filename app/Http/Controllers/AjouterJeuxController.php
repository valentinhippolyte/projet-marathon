<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;

class AjouterJeuxController extends Controller
{
    public function create() {
        return view('jeux.create');
    }
    public function store(Request $request){
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'theme' => 'required',
                'editeur' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $jeux = new Jeu();


        $jeux->nom = $request->nom;
        $jeux->description = $request->description;
        $jeux->theme_id = 1;
        $jeux->editeur_id = 1;
        $jeux->user_id = 1;

        // insertion de l'enregistrement dans la base de données
        $jeux->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/jeux');
    }
}
