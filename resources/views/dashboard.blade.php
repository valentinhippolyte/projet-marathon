@extends('base.master')

@section('title', 'Dashboard')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h2>Ludotheque</h2>
    <form method="GET">
    <div class="card-columns">
    @foreach(Auth::user()->ludo_perso as $valeur)
            <span style="display: none">{{$id=$valeur->id}}</span>
        @if($valeur!=null)
        <x-CardGame id={{$id}} />
                <div class="info-jeux" style="border-color: orange">
                    <a class="link-info"href="/jeux/{{$id}}"><br>En savoir plus</a>
                    <button type="submit" class="btn btn-primary" name="idV" value="{{$id}}">Supprimer</button>
                </div>
            @endif
    @endforeach
    </div>
    </form>

    <?php
    if(isset($_GET['idV'])){
        Illuminate\Support\Facades\DB::delete("DELETE FROM achats WHERE jeu_id = ? AND user_id = ?",
                    [$_GET["idV"], \Illuminate\Support\Facades\Auth::user()->id]);
        redirect('/dashboard')->send();
    }
    ?>
</x-app-layout>
@endsection
