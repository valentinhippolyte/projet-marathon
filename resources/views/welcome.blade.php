@extends('base.master')

@section('title', 'Liste des jeux')

@section('navbar')
    @parent
    <h3 style="text-align: center">Jeu alé</h3>
@endsection
@section('content')
    <div class=" alert alert-success"><h2>Jeux alé </h2></div><h2>Jeux alé </h2>
    <a href="">Choix de 5 jeux aléatoires</a>
    @for ($i=0; $i<5; $i)
        @if(!empty($jeux))
            <ul>
                @foreach($jeux as $jeu)
                    <?php $a = rand(0,1000)?>
                    @if($jeu->id == $a)
                        <li>Jeu numéro {{$i +=1}} : {{$jeu->nom}}</li>
                    @endif
                @endforeach
            </ul>
        @else
            <h3>aucun jeu</h3>
        @endif
    @endfor
    <a href="http://127.0.0.1:8000/jeux">Liste complète des jeux</a>

@endsection
