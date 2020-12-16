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
    function liste() {
        $jeux = Jeu::all();
        return view('jeux.liste', ['jeux' => $jeux]);
    }

    function aléatoire() {
        $jeux = Jeu::all();
        return view('welcome', ['jeux' => $jeux]);
    }
}
