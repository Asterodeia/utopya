@extends('layouts.app')

@section('content')
    <div class="row">
        <form class="col s12" action="{{url('persos')}}" method="POST">
            {{ csrf_field() }}
            <h2>Nouveau personnage</h2>
            <div class="row">
                <div class="input-field col s6">
                    <input id="perso-name" name="name" type="text" class="validate">
                    <label for="perso-name">Nom</label>
                </div>
                <div class="input-field col s6">
                    <input id="perso-race" name="race" type="text" class="validate">
                    <label for="perso-race">Race</label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Créer
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>

    @if (count($persos) > 0)
        <div class="collection">
            @foreach ($persos as $perso)
                <li class="collection-item">{{ $perso->name }} ({{ $perso->race }})</li>
            @endforeach
        </div>
    @endif
@endsection
