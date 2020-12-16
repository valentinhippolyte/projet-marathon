<form action="{{route('commentaires.store')}}" method="POST">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Ajouter un commentaire</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        <label for="commentaire"></label>
        <textarea name="com" class="form-control" placeholder="Votre commentaire..." cols="70" rows="3">{{old('commentaire')}}</textarea>
    </div>
    <div>
        <label for="note">Note (0-5):</label>
        <input type="number" class="form-control" id="note" name="note"
               min="0" max="5" value="{{old('note')}}">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Commenter</button>
    </div>
</form>
