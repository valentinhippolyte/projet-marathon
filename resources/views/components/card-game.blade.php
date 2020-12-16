<div class="card text-white border border-dark rounded" style="width: 18rem; background: #25737d; min-width: 18rem; max-width: 18rem;">
    <img src="{{$jeux["url_media"]}}" class="card-img-top" alt="avatar">
    <div class="card-body">
        <h5 class="card-title" style="text-align: center">{{$jeux["nom"]}}</h5>

        <div class="border border-light rounded">
            <div class="card-header">
                Thèmes
            </div>
            <div class="list-group list-group-flush">
                @foreach($jeux->mecaniques as $mecanique)
                    <li class="list-group-item" style="background: #25737d;">{{$mecanique->nom}}</li>
                @endforeach
            </div>
        </div>
        <p class="card-text">Themes : {{$jeux->theme->nom}}</p>
        <p class="card-text">Editeur : {{$jeux->editeur->nom}}</p>
    </div>
</div>
