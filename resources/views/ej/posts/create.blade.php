<div class="wrapping-message-form">
    <h2>Nouveau
        @if($chapitre)
            message
        @else
            chapitre
        @endif
    </h2>
    <form action="{{url('ej/posts')}}" method="POST" class="pure-form pure-form-stacked">
        {{ csrf_field() }}
        @if($chapitre)
            <input type="hidden" id="chapitre_id" name="chapitre_id" value="{{$chapitre->id}}"/>
        @endif
        <input type="hidden" id="lieu_id" name="lieu_id" value="{{$lieu->id}}"/>
        <label for="titre">Titre</label>
        <input id="titre" name="titre" type="text" class="validate entete" required value="{{ old('titre') }}">
        <p class="error-field {{ $errors->has('titre') ? 'error' : '' }}">{{ $errors->has('titre') ? $errors->first('titre') : 'Votre titre n\'est pas valide' }}</p>

        <label for="texte">Texte</label>
        <textarea id="texte" name="texte" required class="contenu">{{ old('texte') }}</textarea>
        <p class="error-field {{ $errors->has('texte') ? 'error' : '' }}">{{ $errors->has('texte') ? $errors->first('texte') : 'Votre texte n\'est pas valide' }}</p>

        <button class="pure-button pure-button-primary" type="submit" name="action">Poster</button>
        <button class="pure-button" type="reset" name="action">Annuler</button>
    </form>
</div>
