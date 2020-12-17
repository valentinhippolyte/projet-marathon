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
    </div>
    <div>Statistique du jeu</div>
    <?php use App\Models\Commentaire;use App\Models\Jeu;use Illuminate\Support\Facades\Auth;$count = 0;$sum=0; $max=0; $min=5?>
    @foreach($jeu->commentaires as $c)
        @if($min>$c['note'])
            <p style="display: none">{{$min = $c['note']}}</p>
        @endif
        @if($max<$c['note'])
            <p style="display: none">{{$max = $c['note']}}</p>
        @endif
        <?php $count++?><p style="display: none">{{$sum+=$c['note']}}</p>
    @endforeach
    @if($count!=0)
        <p><strong>Note moyenne du jeu : </strong>{{$sum/$count}}</p>
    @else
        <p><strong>Note moyenne du jeu : </strong>pas de note sur ce jeu</p>
    @endif
    <div>
        {{-- la durée  --}}
        <p><strong>Note maximale du jeu : </strong>{{$max}}</p>
    </div>
    <div>
        {{-- la durée  --}}
        <p><strong>Note minimale du jeu : </strong>{{$min}}</p>
    </div>
    <div>
        {{-- la durée  --}}
        <p><strong>Nombre de commentaires pour le jeu : </strong>{{$count}}</p>
    </div>
    <div>
        <p><strong>Nombre de commentaires total pour tous les jeux : </strong>{{DB::table('commentaires')->count()}}</p>
    </div>
    <div>Informations tarifaires du jeu</div>
    <div>
        <?php $countA = 0;$sumA=0; $maxA=0; $minA=300?>
        @foreach($jeu->acheteurs as $a)
            @if($minA>$a['achat']['prix'])
                <p style="display: none">{{$minA = $a['achat']['prix']}}</p>
            @endif
            @if($maxA<$a['achat']['prix'])
                <p style="display: none">{{$maxA = $a['achat']['prix']}}</p>
            @endif
            <?php $countA++?><p style="display: none">{{$sumA+=$a['achat']['prix']}}</p>
        @endforeach
        @if($countA!=0)
            <p><strong>Le prix moyen de ce jeu : </strong>{{$sumA/$countA}}</p>
        @else
            <p><strong>Le prix moyen de ce jeu : </strong>pas d'information sur le prix du jeu</p>
        @endif
    </div>
    <div>
        <p><strong>Prix maximal du jeu : </strong>{{$maxA}}</p>
    </div>

    <div>
        <p><strong>Prix minimal du jeu : </strong>{{$minA}}</p>
    </div>
    <div>
        <p><strong>Nombre d'utilisateur qui possède ce jeu : </strong>{{$countA}}</p>
    </div>
    <div>
        <p><strong>Nombre total d'utilisateur du site : </strong>{{DB::table('users')->count()}}</p>
    </div>
    <div>
        <a href="http://localhost:8000/jeux">Retour à la liste</a>
    </div>

    <?php $posted = false; ?>
        @foreach ($commentaires as $unCom)
            @if ($unCom->user_id == Auth::id() and $unCom->jeu_id == $jeu->id)
                {{$posted = true}}
                @break
            @endif
        @endforeach


    @if (auth()->check() and !$posted)
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
    @elseif(!auth()->check())
        <p>Pour ajouter un commentaire, identifiez vous <a href="/login">ici</a></p>
    @endif


    <form method="GET">
        {!! csrf_field() !!}
        <label>Trier par :
            <select name="trie" >
                <option  value="Plus_recent">Plus récent</option>
                <option  value="Plus_ancien">Plus ancien</option>
            </select>
        </label>
        <input type="submit" name="button" value=" Trier ">
    </form>
    <div>
        @if(isset($_GET['trie']) and $_GET['trie'] == "Plus_ancien")
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
        @else
            @foreach($commentairesTrie as $com)
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
        @endif
    </div>

@endsection





