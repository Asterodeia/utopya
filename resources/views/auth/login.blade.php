@extends('layouts.hj')

@section('content')
    <form action="{{ url('/login') }}" method="POST" role="form" class="pure-form pure-form-stacked">
        {{ csrf_field() }}
        <legend>Login</legend>

        <label for="email">E-Mail</label>
        <input id="email" name="email" type="email" placeholder="jaimelerp@rpg.com"  value="{{ old('email') }}">
        <p class="error-field {{ $errors->has('email') ? 'error' : '' }}">{{ $errors->has('email') ? $errors->first('email') : 'Veuillez saisir une adresse valide' }}</p>

        <label for="password">Mot de passe</label>
        <input id="password" name="password" type="password" placeholder="amortleselfes">

        <p class="error-field {{ $errors->has('password') ? 'error' : '' }}">{{ $errors->has('password') ? $errors->first('password') : 'Mot de passe faux' }}</p>

        <label for="remember" class="pure-checkbox">
            <input type="checkbox" id="remember" name="remember"/> Se souvenir de moi.
        </label>

        <button type="submit" class="pure-button pure-button-primary">Se connecter</button>
    </form>
@endsection
