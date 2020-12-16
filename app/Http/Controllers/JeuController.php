<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeu;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function liste()
    {
        $jeux = Jeu::all();
        return view('jeux.liste', ['jeux' => $jeux]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
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
}
