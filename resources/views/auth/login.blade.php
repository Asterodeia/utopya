@extends('layouts.app')

@section('content')
    <div class="section">
        <form action="{{ url('/login') }}" method="POST" role="form" class="col s6">
            {{ csrf_field() }}
            <div class="row">
                <div class="col s6 offset-s3">
                    <h2>Login</h2>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" placeholder="jaimelerp@rpg.com"
                                   class="validate {{ $errors->has('email') ? ' invalid active' : '' }}">
                            <label for="email"
                                   data-error="{{ $errors->has('email') ? $errors->first('email') : 'Veuillez saisir une adresse valide' }}"
                                   class="{{ $errors->has('email') ? 'active' : '' }}">E-Mail</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" name="password" type="password" placeholder="amortleselfes"
                                   class="validate {{ $errors->has('password') ? ' invalid' : '' }}">
                            <label for="password"
                                   data-error="{{ $errors->has('password') ? $errors->first('password') : '' }}"
                                   class="{{ $errors->has('password') ? 'active' : '' }}">Mot de passe</label>
                            </col>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input type="checkbox" id="remember" name="remember"/>
                            <label for="remember">Se souvenir de moi.</label>
                            </col>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Connexion
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
