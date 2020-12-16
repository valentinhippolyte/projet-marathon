@extends('base.master')

@section('title', 'Liste des jeux')

@section('navbar')
    @parent
@endsection
@section('content')
    <h2 style="text-align: center">Jeux aléatoire </h2>
    <button name="button choix aléatoire" type="button" class="bouton"><a href="">Choix de 5 jeux aléatoires</a></button>
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
    <button name="button choix aléatoire" type="button" class="bouton"><a href="http://127.0.0.1:8000/jeux">Liste complète des jeux</a></button>

@endsection
