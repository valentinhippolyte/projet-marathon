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
    <?php $count = 0;$sum=0; $max=0; $min=5?>
    @foreach($jeu->commentaires as $c)
        @if($min>$c['note'])
            <p style="display: none">{{$min = $c['note']}}</p>
        @endif
        @if($max<$c['note'])
            <p style="display: none">{{$max = $c['note']}}</p>
        @endif
        <?php $count++?><p style="display: none">{{$sum+=$c['note']}}</p>
    @endforeach
    @if($min<=2)
        <div>
            <p style="color: red"><strong>Note minimale du jeu : </strong>{{$min}}</p>
        </div>
    @endif
    @if($min==3)
        <div>
            <p style="color: #FFD700"><strong>Note minimale du jeu : </strong>{{$min}}</p>
        </div>
    @endif
    @if($min>3)
        <div>
            <p style="color: green"><strong>Note minimale du jeu : </strong>{{$min}}</p>
        </div>
    @endif
    @if($max<=2)
        <div>
            <p style="color: red"><strong>Note maximale du jeu : </strong>{{$max}}</p>
        </div>
    @endif
    @if($max==3)
        <div>
            <p style="color: #FFD700"><strong>Note maximale du jeu : </strong>{{$max}}</p>
        </div>
    @endif
    @if($max>3)
        <div>
            <p style="color: green"><strong>Note maximale du jeu : </strong>{{$max}}</p>
        </div>
    @endif
    @if($count!=0)
        <?php $moyenne = $sum/$count?>
        @if($moyenne<=2)
            <div>
                <p style="color: red"><strong>Note moyenne du jeu : </strong>{{$sum/$count}}</p>
            </div>
        @endif
        @if(2<$moyenne && $moyenne<3)
            <div>
                <p style="color: #FFD700"><strong>Note moyenne du jeu : </strong>{{$sum/$count}}</p>
            </div>
        @endif
        @if(3<=$moyenne)
            <div>
                <p style="color: green"><strong>Note moyenne du jeu : </strong>{{$sum/$count}}</p>
            </div>
        @endif
    @else
        <p><strong>Note moyenne du jeu : </strong>pas de note sur ce jeu</p>
    @endif
    <div>
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
                <div id="msform">
                    <ul id="progressbar">
                        <li class="min">{{$minA}}</li>
                        <li class="moyen"><p>⇑</p>{{$sumA/$countA}}</li>
                        <li class="max">{{$maxA}}</li>
                    </ul>
                </div>
        @else
            <p><strong>Le prix moyen de ce jeu : </strong>pas d'information sur le prix du jeu</p>
        @endif
    </div>
    <style>
        body {
            font-family: arial;
        }
        /*form styles*/
        #msform {
            width: 50%;
            margin: 50px auto;
            text-align: center;
            position: relative;
        }
        #progressbar li {
            list-style-type: none;
            color: black;
            text-transform: uppercase;

            width: 33.33%;
            float: left;
            position: relative;
        }
        #progressbar li.min:before {
            content: "min";
        }
        #progressbar li.max:before {
            content: "max";
        }
        #progressbar li.moyen:before {
            content: "moyen";
        }
        #progressbar li.moyen p {
            font-size: 200%;
            color: #1c7430;
        }
        #progressbar li:before {
            width: 60%;
            line-height: 20px;
            padding: 10px;
            display: block;
            font-size: 200%;
            background: grey;
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            font-size: 150%;
            background: black;
            position: absolute;
            left: -50%;
            top: 25%;
            z-index: -1;
        }
        #progressbar li:first-child:after {
            content: none;
        }
        #progressbar li.min:before,  #progressbar li.min:after{
            background: green;
        }
        #progressbar li.max:before{
            background: red;
        }
    </style>
    <div>
        <p><strong>Nombre d'utilisateur qui possède ce jeu : </strong>{{$countA}}</p>
    </div>
    <div>
        <p><strong>Nombre total d'utilisateur du site : </strong>{{DB::table('users')->count()}}</p>
    </div>
    <div class="progress-circle">
        <div class="progress-masque">
            <div class="progress-barre"></div>
        </div>
    </div>
    <style>
        .progress-masque {
            position: absolute;
            width: 1em;                     /* 100% de la largeur */
            height: 1em;                    /* 100% de la hauteur */
            left: -.15em;                   /* décalage de la largeur bordure de la gauge */
            top: -.15em;                    /* décalage de la largeur bordure de la gauge */
            clip: rect(0, 1em, 1em, .5em);  /* par défaut seule la partie droite est visible */
        }

        .progress-circle{
            position: relative;
            box-sizing: border-box;
            font-size: 6em;
            width: 1em;                     /* fixe la largeur */
            height: 1em;                    /* fixe la hauteur */
            border-radius: 50%;             /* rendu aspect circulaire */
            border: .15em solid grey;
            background-color: #FFF;
        }

        .progress-barre,
        .progress-sup50 {
            position: absolute;
            box-sizing: border-box;         /* prise en compte bordure dans la dimension */
            border-width: .15em;
            border-style: solid;
            border-color: green;
            border-radius: 50%;             /* rendu aspect circulaire */
            width: 1em;                     /* largeur à 100% */
            height: 1em;                    /* hauteur à 100% */
            clip: rect(0, .5em, 1em, 0);
        }
        .progress-barre {transform: rotate({{$deg}})}
    </style>
    <div>
        <p><strong>Pourcentage : </strong>{{$pourcent}}</p>
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
    @else
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





