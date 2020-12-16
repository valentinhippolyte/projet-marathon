<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
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
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jeu = Jeu::all()->find($id);
        return view('jeux.show', ['jeu' => $jeu]);
    }





    function aléatoire()
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
