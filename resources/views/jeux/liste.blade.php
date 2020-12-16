@extends('base.master')

@section('title', 'Liste des jeux')

@section('navbar')
    @parent
    <h3 style="text-align: center">Bienvenue dans la liste des jeux</h3>
@endsection
@section('content')
    <h2>La liste des jeux</h2>

    @if(!empty($jeux))
        <ul>
            @foreach($jeux as $jeu)
                <li>Nom: {{$jeu->nom}} {{$jeu->url_media}}, Joueurs:  {{$jeu->nombre_joueurs}},
                    Thème:  {{$jeu->categorie}}, Durée: {{$jeu->duree}}, <a>Plus d'info</a></li>
            @endforeach
        </ul>
    @else
        <h3>aucun jeu</h3>
    @endif

@endsection
