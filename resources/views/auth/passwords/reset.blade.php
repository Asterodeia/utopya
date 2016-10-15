@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section">
            <form role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <h2>Réinitialisation de mot de passe</h2>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" name="email" type="email" placeholder="jaimelerp@rpg.com"
                               value="{{ $email or old('email') }}"
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
                        <input id="password_confirm" name="password_confirm" type="password" placeholder="amortleselfes"
                               class="validate {{ $errors->has('password_confirmation') ? ' invalid' : '' }}">
                        <label for="password_confirm"
                               data-error="{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}"
                               class="{{ $errors->has('password_confirmation') ? 'active' : '' }}">Confirmation du mot
                            de
                            passe</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Réinitialiser
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
