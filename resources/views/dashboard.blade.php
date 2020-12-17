@extends('base.master')

@section('title', 'Ludothèques')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ma Ludothèque') }}
        </h2>
    </x-slot>

    <form method="GET">
    <div class="card-deck deck-carte container">
    @foreach(Auth::user()->ludo_perso as $valeur)
            <span style="display: none">{{$id=$valeur->id}}</span>
        @if($valeur!=null)
            <div>
                <x-CardGame id={{$id}} />
                    <div class="info-jeux">
                        <a class="link-info"href="/jeux/{{$id}}"><br>En savoir plus</a>
                        <button type="submit" class="btn btn-primary" name="idV" value="{{$id}}">Supprimer</button>
                    </div>
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



