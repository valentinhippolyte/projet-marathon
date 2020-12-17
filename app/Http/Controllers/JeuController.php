<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeu;
use App\Models\User;
use Illuminate\Http\Request;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sort = null)
    {
        if ($sort !== null){
            $jeux = Jeu::all()->sortBy('nom');
        }else{
            $jeux = Jeu::all();
        }
        return view('jeux.index', ['jeux' => $jeux]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('jeux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
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
        $jeux->age = $request->age;
        $jeux->nombre_joueurs = $request->nombre_joueurs;
        $jeux->description = $request->description;
        $jeux->categorie = $request->categorie;
        $jeux->duree = $request->duree;
        $jeux->theme_id = 1;
        $jeux->editeur_id = 1;
        $jeux->user_id = 1;

        // insertion de l'enregistrement dans la base de données
        $jeux->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/jeux');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nombreJoueursAyantLeJeu = Jeu::find($id)->acheteurs()->count();
        $nombreTotalJoueurs = User::all()->count();
        $a = $nombreJoueursAyantLeJeu/$nombreTotalJoueurs* 360;
        $deg = $a."deg";
        $a = $a/360*100;
        $jeu = Jeu::all()->find($id);
        $commentaires = Commentaire::all();
        $users = User::all();
        $commentairesTrie = Commentaire::orderBy('date_com','DESC')->get();
        return view('jeux.show', ['jeu' => $jeu, 'commentaires' => $commentaires, 'users' => $users, 'commentairesTrie' => $commentairesTrie, 'deg'=>$deg, 'pourcent'=>$a]);
    }

    function aleatoire()
    {

        $jeux = Jeu::all();
        return view('welcome', ['jeux' => $jeux]);
    }


    function regles(){
        $jeux = Jeu::all();
        return view('regles', ['jeux' => $jeux]);
    }
    function trie(){
        $jeuxtrie = Jeu::orderBy('nom','ASC')->get();
        return view('jeux.index', ['jeux' => $jeuxtrie]);
    }
}
