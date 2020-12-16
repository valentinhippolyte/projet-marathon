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
                <li>{{$jeu->nom}} {{$jeu->description}} {{$jeu->regles}} {{$jeu->langue}} {{$jeu->url_media}} {{$jeu->age}} {{$jeu->nombre_joueurs}} {{$jeu->categorie}} {{$jeu->duree}}</li>
            @endforeach
        </ul>
    @else
        <h3>aucune tâche</h3>
    @endif

@endsection
