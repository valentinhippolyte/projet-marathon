@extends('base.master')



@section('title', 'Règles des jeux')

@section('content')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Les règles des jeux</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        @foreach($jeux as $jeu)
            <li>{{$jeu->nom}} : {{$jeu->regles}}; <a href="http://localhost:8000/jeux/{{$jeu->id}}"> lien vers le jeu </a></li>
            <hr>
        @endforeach
    </div>
    <div>
        <a href="http://127.0.0.1:8000/jeux">Liste complète des jeux</a>
    </div>
@endsection




