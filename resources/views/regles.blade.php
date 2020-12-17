@extends('base.master')




@section('title', 'Règles des jeux')

@section('content')

@section('content')


    <div class="text-center" style="margin-top: 2rem">
        <h3>Les règles des jeux</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        @foreach($jeux as $jeu)
            <li class ="liste_jeux">{{$jeu->nom}} : {{$jeu->regles}}; <br><button class="btn btn-secondary btn-show" type="submit"><a href="http://localhost:8000/jeux/{{$jeu->id}}"> lien vers le jeu </a></button></li>
            <hr>
        @endforeach
    </div>

@endsection





        <button type="button" class="btn btn-info btn-show"><a href="http://127.0.0.1:8000/jeux">Liste complète des jeux</a></button>
    </div>
@endsection

