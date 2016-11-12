@extends('layouts.hj')

@section('content')
    <form role="form" method="POST" action="{{ url('/register') }}" class="pure-form pure-form-stacked">
        {{ csrf_field() }}
        <legend>Création d'un compte utilisateur</legend>

        <label for="name">Nom d'utilisateur</label>
        <input id="name" name="name" type="text" placeholder="Bonjoueur" value="{{ old('name') }}" required autofocus>
        <p class="error-field {{ $errors->has('name') ? 'error' : '' }}">{{ $errors->has('name') ? $errors->first('name') : 'Ce champ est erronné' }}</p>

        <label for="email">E-Mail</label>
        <input id="email" name="email" type="email" placeholder="jaimelerp@rpg.com" required>
        <p class="error-field {{ $errors->has('email') ? 'error' : '' }}">{{ $errors->has('email') ? $errors->first('email') : 'Veuillez saisir une adresse valide' }}</p>

        <label for="password">Mot de passe</label>
        <input id="password" name="password" type="password" placeholder="amortleselfes" required>
        <p class="error-field {{ $errors->has('password') ? 'error' : '' }}">{{ $errors->has('password') ? $errors->first('password') : 'Mot de passe faux' }}</p>

        <label for="password_confirmation" Confirmation du mot de passe</label>
        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="amortleselfes">
        <p class="error-field {{ $errors->has('password_confirmation') ? 'error' : '' }}">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : 'Mot de passe faux' }}</p>

        <button type="submit" class="pure-button pure-button-primary">Se connecter</button>
    </form>
@endsection
