@extends('base.master')

@section('title', 'Liste des jeux')

@section('navbar')
    @parent
    <h3 style="text-align: center">Jeu alé</h3>
@endsection
@section('content')
    <h2>Jeux alé</h2>
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
            <h3>aucune tâche</h3>
        @endif
    @endfor

@endsection
