@extends('base.master')

@section('title', 'Liste des jeux')

@section('content')
<form action="{{route('jeux.store')}}" method="POST">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Ajouter un jeu</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        <label for="expiration"><strong>Nom : </strong></label>
        <input type="text" name="nom" class="form-control" id="expiration" class="form"
               value="{{ old('nom') }}"
               placeholder="ex: 'Fallout'">
    </div>
    <div>
        <label for="categorie"><strong>Description</strong></label>
        <input type="text" class="form-control" id="description" name="description" class="form"
               value="{{ old('description') }}">
    </div>
    <div>
        <label for="categorie"><strong>Thème</strong></label>
        <input type="text" class="form-control" id="theme" name="theme" class="form"
               value="{{ old('theme') }}">
    </div>
    <div>
        <label for="text"><strong>Editeur :</strong></label>
        <input name="editeur" id="editeur" class="form-control" class="form"
                  placeholder="editeur..">{{ old('editeur') }}</input>
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valider</button>
    </div>
</form>


@endsection
