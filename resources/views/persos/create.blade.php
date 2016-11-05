@extends('layouts.hj')

@section('content')
    <form action="{{url('persos')}}" method="POST" class="pure-form pure-form-stacked">
        {{ csrf_field() }}
        <legend>Nouveau personnage</legend>
        <label for="nom">Nom</label>
        <input id="nom" name="nom" type="text" class="validate" required value="{{ old('nom') }}">
        <p class="error-field {{ $errors->has('nom') ? 'error' : '' }}">{{ $errors->has('nom') ? $errors->first('nom') : 'Votre nom de personnage n\'est pas valide' }}</p>

        <label for="race">Race</label>
        <select name="race" id="race" value="{{ old('race') }}">
            <option value="" selected>-- Choisissez votre race</option>
            <option value="Eïl">Eïl</option>
            <option value="Elfe">Elfe</option>
            <option value="Hobbit">Hobbit</option>
            <option value="Humain">Humain</option>
            <option value="Nain">Nain</option>
        </select>
        <p class="error-field {{ $errors->has('race') ? 'error' : '' }}">{{ $errors->has('race') ? $errors->first('race') : 'La race choisie n\'est pas valide' }}</p>
        <button class="pure-button pure-button-primary" type="submit" name="action">Créer
        </button>
        <button class="pure-button" type="reset" name="action">Annuler
        </button>
        </div>
        </div>
    </form>
    </div>
    </div>
@endsection
