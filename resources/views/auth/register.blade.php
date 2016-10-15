@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section">
            <form role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <h2>Création d'un compte utilisateur</h2>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="name" name="name" type="text" placeholder="Bonjoueur" value="{{ old('name') }}"
                               class="validate {{ $errors->has('name') ? ' invalid active' : '' }}" required autofocus>
                        <label for="name"
                               data-error="{{ $errors->has('name') ? $errors->first('name') : 'Ce champ est erronné' }}"
                               class="{{ $errors->has('name') ? 'active' : '' }}">Nom d'utilisateur</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" name="email" type="email" placeholder="jaimelerp@rpg.com"
                               value="{{ old('email') }}"
                               class="validate {{ $errors->has('email') ? ' invalid active' : '' }}" required>
                        <label for="email"
                               data-error="{{ $errors->has('email') ? $errors->first('email') : 'Veuillez saisir une adresse valide' }}"
                               class="{{ $errors->has('email') ? 'active' : '' }}">E-Mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="password" name="password" type="password" placeholder="amortleselfes"
                               class="validate {{ $errors->has('password') ? ' invalid' : '' }}" required>
                        <label for="password"
                               data-error="{{ $errors->has('password') ? $errors->first('password') : '' }}"
                               class="{{ $errors->has('password') ? 'active' : '' }}">Mot de passe</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="amortleselfes"
                               class="validate {{ $errors->has('password_confirmation') ? ' invalid' : '' }}">
                        <label for="password_confirm"
                               data-error="{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}"
                               class="{{ $errors->has('password_confirmation') ? 'active' : '' }}">Confirmation du mot
                            de
                            passe</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Enregistrer
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
