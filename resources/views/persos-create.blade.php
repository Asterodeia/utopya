@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s6 offset-s3">
            <form class="col s12" action="{{url('persos')}}" method="POST">
                {{ csrf_field() }}
                <h2>Nouveau personnage</h2>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="perso-name" name="name" type="text" class="validate">
                        <label for="perso-name">Nom</label>
                    </div>
                    <div class="input-field col s12">
                        <select name="race" id="race">
                            <option value="" selected>-- Choisissez votre race</option>
                            <option value="Eïl">Eïl</option>
                            <option value="Elfe">Elfe</option>
                            <option value="Hobbit">Hobbit</option>
                            <option value="Humain">Humain</option>
                            <option value="Nain">Nain</option>
                        </select>
                        <label>Race</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Créer
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
