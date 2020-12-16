@extends('base.master')

@section('title', 'Liste des jeux')

@section('content')
    <form action="{{route('jeux.store')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3>Ajouter un jeu</h3>
            <hr class="mt-2 mb-2">
        </div>

        <!-- Nom -->
        <div>
            <label for="expiration"><strong>Nom : </strong></label>
            <input type="text" name="nom" id="expiration" class="form-control"
                   value="{{ old('nom') }}"
                   placeholder="ex: 'Fallout'">
        </div>



        <!--regle -->
        <div>
            <label for="text"><strong>Règle :</strong></label>
            <textarea type="textbox" name="regle" id="regle" class="form-control" placeholder="Les règles sont...">{{ old('regle') }}</textarea>
        </div>


        <!--age -->
        <div>
            <label for="text"><strong>Age recommandé :</strong></label>
            <input type="number" name="age" id="age" class="form-control" >{{ old('age') }}</input>
        </div>

        <!--nombre_joueurs -->
        <div>
            <label for="text"><strong>Nombre de joueur :</strong></label>
            <input type="number" name="nombre_joueurs" id="nombre_joueurs" class="form-control" >{{ old('nombre_joueurs') }}</input>
        </div>

        <!--categorie -->
        <div>
            <label for="text"><strong>Catégorie :</strong></label>
            <input name="categorie" id="categorie" class="form-control" >{{ old('categorie') }}</input>
        </div>

        <!--duree -->
        <div>
            <label for="text"><strong>Durée :</strong></label>
            <input name="duree" id="duree" class="form-control" >{{ old('duree') }}</input>
        </div>


        <!-- description -->
        <div>
            <label for="categorie"><strong>Description</strong></label>
            <input type="text" class="form-control" id="description" name="description"
                   value="{{ old('description') }}">
        </div>

        <!-- thème -->
        <div>
            <label for="categorie"><strong>Thème</strong></label>
            <input type="text" class="form-control" id="theme" name="theme"
                   value="{{ old('theme') }}">
        </div>

        <!-- editeur -->
        <div>
            <label for="text"><strong>Editeur :</strong></label>
            <input name="editeur" id="editeur" class="form-control"
                   placeholder="editeur..">{{ old('editeur') }}</input>
        </div>


        <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>


@endsection
