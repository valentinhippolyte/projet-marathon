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
    <div class="card-deck">
    @foreach(Auth::user()->ludo_perso as $valeur)
            <span style="display: none">{{$id=$valeur->id}}</span>
        @if($valeur!=null)
        <x-CardGame id={{$id}} />
            @endif
    @endforeach
    </div>
</x-app-layout>
@endsection
