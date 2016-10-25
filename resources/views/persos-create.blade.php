@extends('layouts.hj')

@section('content')
    <form action="{{url('persos')}}" method="POST" class="pure-form pure-form-stacked">
        {{ csrf_field() }}
        <legend>Nouveau personnage</legend>
        <label for="perso-name">Nom</label>
        <input id="perso-name" name="name" type="text" class="validate" required>

        <label for="race">Race</label>
        <select name="race" id="race">
            <option value="" selected>-- Choisissez votre race</option>
            <option value="Eïl">Eïl</option>
            <option value="Elfe">Elfe</option>
            <option value="Hobbit">Hobbit</option>
            <option value="Humain">Humain</option>
            <option value="Nain">Nain</option>
        </select>
        <button class="pure-button pure-button-primary" type="submit" name="action">Créer
        </button>
        </div>
        </div>
    </form>
    </div>
    </div>
@endsection
