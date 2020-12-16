@extends('base.master')
@section('content')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Affichage d'un jeu</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- la photo  --}}
        <img src="{{$jeu->url_media}}">
    </div>
    <div>
        {{-- la nom  --}}
        <p><strong>Nom : </strong>{{$jeu->nom}}</p>
    </div>

    <div>
        {{-- les mécaniques  --}}
        <p><strong>Mécaniques : </strong>
            @foreach($jeu->mecaniques as $mecanique)
                <li>{{$mecanique->nom}}</li>
            @endforeach
        </p>
    </div>
    <div>
        {{-- la description  --}}
        <p><strong>Description : </strong>{{$jeu->description}}</p>
    </div>
    <div>
        {{-- le thème  --}}
        <p><strong>Thème : </strong>{{$jeu->theme->nom}}</p>
    </div>
    <div>
        {{-- la catégorie  --}}
        <p><strong>Catégorie : </strong>{{$jeu->categorie}}</p>
    </div>
    <div>
        {{-- la langue  --}}
        <p><strong>Langue : </strong>{{$jeu->langue}}</p>
    </div>
    <div>
        {{-- l'éditeur'  --}}
        <p><strong>Editeur : </strong>{{$jeu->editeur->nom}}</p>
    </div>
    <div>
        {{-- la nombre de joueurs  --}}
        <p><strong>Joueurs : </strong>{{$jeu->nombre_joueurs}}</p>
    </div>
    <div>
        {{-- la durée  --}}
        <p><strong>Durée : </strong>{{$jeu->duree}}</p>
    </div>

    <div>
        <a href="http://localhost:8000/jeux">Retour à la liste</a>
    </div>
    @if (auth()->check())
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('commentaires.store')}}" method="POST">
            {!! csrf_field() !!}
            <div class="text-center" style="margin-top: 2rem">
                <h3>Ajouter un commentaire</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div>
                <label>
                    <textarea name="commentaire" placeholder="Votre commentaire..." cols="70" rows="3">{{old('commentaire')}}</textarea>
                </label>
            </div>
            <div>
                <label for="note">Note (0-5):</label>
                <input type="number" class="form-control" id="note" name="note"
                       min="0" max="5" value="{{old('note')}}">
            </div>
            <div>
                <input type="hidden" id="jeu_id" name="jeu_id" value="{{$jeu->id}}">
            </div>
            <div>
                <button class="btn btn-success" type="submit">Commenter</button>
            </div>
        </form>
    @endif

    <div>
        @foreach($commentaires as $com)
            @if($com->jeu_id == $jeu->id)
                @foreach($users as $user)
                    @if($user->id == $com->user_id)
                        <ul>
                            <li>{{$user->name}}, {{$com->date_com}}</li>
                            <li>Note: {{$com->note}}/5, Commentaire : {{$com->commentaire}}</li>
                        </ul>
                        @break
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>

@endsection





