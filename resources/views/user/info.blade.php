@extends('base.master')

@section('title', 'Liste des jeux')

@section('navbar')
    @parent
    <h3 style="text-align: center">Vos information</h3>
@endsection
@section('content')
    <h2>La liste de informationnions personnelles</h2>
    <ul>
        <li>Nom de l'utilisateur : {{Auth::user()->name}}</li>
        <li>Addresse de l'utilisateur : {{Auth::user()['email']}}</li>
    </ul>


@endsection
