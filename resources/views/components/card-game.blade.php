<div class="card text-white border border-dark rounded" style="width: 18rem; background: rgb(37, 115, 125);">
    <img src="{{$jeux["url_media"]}}" class="card-img-top" alt="avatar">
    <div class="card-body">
        <h5 class="card-title" style="text-align: center">{{$jeux["nom"]}}</h5>
        <div class="border border-light rounded">
            <div class="card-header" style="text-align: center">
                Thèmes
            </div>
            <ul class="list-group list-group-flush" >
                @foreach($jeux->mecaniques as $mecanique)
                    <li class="list-group-item" style="background: rgb(37, 115, 125);">{{$mecanique->nom}}</li>
                @endforeach
            </ul>
        </div>
        <p class="card-text">Catégorie(s) : {{$jeux->theme->nom}}</p>
        <p class="card-text">Editeur : {{$jeux->editeur->nom}}</p>
    </div>
</div>
