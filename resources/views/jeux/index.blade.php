@extends('base.master')

@section('title', 'Liste des jeux')

@section('navbar')
    @parent
    <h3 style="text-align: center">Bienvenue dans la liste des jeux</h3>
@endsection
@section('content')
    <h2>La liste des jeux</h2>
    <div class="trie">
        <form action="{{route('jeux.trie')}}" method="GET">
            {!! csrf_field() !!}
            <label>Trier par : </label>
            <select name="trie">
                <option value="nom">Nom</option>
            </select>
            <input type="submit" value=" Trier ">
        </form>

        <button type="button" class="btn btn-primary btn-add"><a href="/jeux/create"> Ajouter un jeu</a></button>
    </div>
    @if(!empty($jeux))

            <div class="card-columns">
            @foreach($jeux as $jeu)
                <div>
                    <p style="display: none">{{$id=$jeu->id}}</p>
                    <x-CardGame id={{$id}} />
                    <div class="info-jeux" style="border-color: orange">
                        <a class="link-info"href="/jeux/{{$jeu->id}}"><br>En savoir plus</a>
                        <button type="button" class="btn btn-primary "><a href="/jeux/{{$jeu->id}}">Acheter</a></button>
                    </div>
                </div>
            @endforeach
            </div>

    @else
        <h3>aucun jeu</h3>
    @endif
        <!--Nom: {{$jeu->nom}} {{$jeu->url_media}}, Joueurs:  {{$jeu->nombre_joueurs}},
        Thème:  {{$jeu->theme->nom}}, Durée: {{$jeu->duree}}, <a href="http://localhost:8000/jeux/{{$jeu->id}}">Plus d'info</a>-->




@endsection
