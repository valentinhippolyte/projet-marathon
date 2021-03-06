@extends('base.master')

@section('title', 'Liste des jeux')

@section('navbar')
    @parent
@endsection

@section('content')
    <h2>La liste des jeux</h2>
    <div class="trie-index">
        <form action="{{route('jeux.trie')}}" method="GET">
            {!! csrf_field() !!}
            <label>Trier par : </label>
            <select name="trie">
                <option value="nom">Nom</option>
            </select>
            <input type="submit" value=" Trier ">
        </form>
        <button type="button" class="btn btn-primary btn-add"><a href="/regles"> Les règles</a></button>
        <button type="button" class="btn btn-primary btn-add"><a href="/jeux/create"> Ajouter un jeu</a></button>
    </div>
    @if(!empty($jeux))

        <form method="GET">

            <div class="card-deck deck-carte container">

                @foreach($jeux as $jeu)
                    <div>
                        <p style="display: none">{{$id=$jeu->id}}</p>
                        <x-CardGame id={{$id}} />
                        <div class="info-jeux">
                            <a class="link-info"href="/jeux/{{$jeu->id}}"><br>En savoir plus</a>
                            <button type="submit" class="btn btn-primary" name="idV" value="{{$id}}">Acheter</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
        <script>
            function myFunction() {
                alert("Jeu déjà acheté !");
            }
        </script>
        <?php

        if(isset($_GET['idV'])){
            if (auth()->check()) {
            $jeux = App\Models\Jeu::all()->find($_GET['idV']);
            $estAcheter = false;
            foreach ($jeux->acheteurs as $acheteur) {
                if ($acheteur['achat']['user_id'] == Illuminate\Support\Facades\Auth::user()->id) {
                    $estAcheter = true;
                    break;
                }
            }
            if ($estAcheter == false) {
                Illuminate\Support\Facades\DB::table('achats')->insert(
                    array('jeu_id'=>$jeux['id'], 'user_id'=>Illuminate\Support\Facades\Auth::user()->id,
                        'date_achat'=>strftime('%Y-%m-%d %H:%M:%S'), 'lieu'=>'France', 'prix'=>150));
            } else {
                echo "<script>myFunction()</script>";
            }
            } else {
                redirect('/dashboard')->send();
            }
        }
        ?>

    @else
        <h3>Aucun jeu disponible </h3>
    @endif


@endsection
