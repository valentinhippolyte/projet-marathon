@extends('base.master')

@section('title', 'Liste des jeux')


@section('header')


    <div class="container-fluid header">
        <div class="accueil">
            <div class="accueil-contenu">
                <h1>Bienvenue sur RoadToHaveFun !</h1>
                <p>La meilleure des ludothèques !</p>
            </div>
        </div>
    </div>
@endsection

@section('navbar')
    @parent
@endsection

@if(auth()->check())
    @section('content')
        <h2 style="text-align: center">Jeux aléatoire</h2>
        <div class="container-wrapper">
            <div class=" carte-accueil card-deck">
                @for ($i=0; $i<5; $i)
                    @if(!empty($jeux))

                        @foreach($jeux as $jeu)
                            <?php $a = rand(0,1000)?>
                            @if($jeu->id == $a)
                                <div class="center-carte">
                                    <div class="carte_jeux">
                                        <img class="card-img-top" src="/images/image-deco1.jpg" alt="card image cap" style="opacity: 0.5;">
                                        <div class="card-body carte-body">
                                            <h5 class="card-title">Jeu numéro {{$i +=1}} </h5>
                                            <h4 class="card-text">{{$jeu->nom}}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <h3>aucun jeu</h3>
                    @endif
                @endfor
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-secondary btn-show"><a href="">Choisir 5 autres jeux aléatoires</a></button>
            <button type="button" class="btn btn-info btn-show"><a href="/jeux">Liste complète des jeux</a></button>
        </div>
        <div class=" carte-accueil card-deck">
            <?php $count = 0;$sum=0; $lesmeilleurs=array();$compteur=1 ?>
            @foreach($jeux as $jeu)
                @foreach($jeu->commentaires as $c)
                    <?php $count++?><p style="display: none">{{$sum+=$c['note']}}</p>
                @endforeach

                @if($count !== 0)
                    <p style="display: none">{{$lesmeilleurs[$jeu->nom] = $sum/$count}}</p>
                    <?php $count = 0;$sum=0;?>
                @endif
            @endforeach
            {{arsort($lesmeilleurs)}}
            @foreach($lesmeilleurs as $key => $val)

                <div class="container-wrapper">
                    <div class="center-carte">
                        <div class="carte_jeux">
                            <img class="card-img-top" src="/images/image-deco1.jpg" alt="card image cap" style="opacity: 0.5;">
                            <div class="card-body carte-body">
                                <h5 class="card-title">top {{$compteur}}: {{$key}}</h5>
                                <h4>avec une note de {{$val}}</h4>
                                @foreach($jeux as $unJeu)
                                    @if($unJeu->nom == $key)
                                        <a class="link-info"href="/jeux/{{$unJeu->id}}"><br>En savoir plus</a>
                                        @break;
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <?php $compteur++?>

                @if($compteur == 6)
                    @break
                @endif
            @endforeach


    </div>


    <?php if(\Illuminate\Support\Facades\Auth::check()) : ?>
    <?php
        $jeuxC = \App\Models\Jeu::all();
        $jeuxC = count($jeuxC);
        $nb = intdiv($jeuxC, 5);
    ?>
        <?php if(isset($_GET['action'])) : ?>
        <div class="card-columns">
        <p style="display: none">{{$n = $_GET['action']*5}}</p>
        <x-Njeux n={{$n}}/>
        </div>
        <?php else: ?>
        <div class="card-columns">
        <x-Njeux n={{5}}/>
        </div>
        <?php endif; ?>
    @for($i=1;$i<=$nb;$i++)
            <a role="button" style="padding-right: 9%;" href="?action={{$i}}">{{$i}}</a>
        @endfor
    <?php endif ?>


@endsection
@endif
