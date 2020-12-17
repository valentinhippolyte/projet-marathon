<div>
    @foreach($tab1 as $jeu)
        <p style="display: none">{{$id = $jeu['id']}}</p>
        <x-CardGame id={{$id}} />
    @endforeach

</div>
