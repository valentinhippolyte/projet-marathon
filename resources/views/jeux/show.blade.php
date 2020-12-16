<div class="text-center" style="margin-top: 2rem">
    <h3>Affichage d'une tâche</h3>
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
         <p><strong>Note moyenne du jeu : </strong>{{ceil($sum/$count)}}</p>

</div>
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
    <a href="http://localhost:8000/jeux">Retour à la liste</a>
</div>

