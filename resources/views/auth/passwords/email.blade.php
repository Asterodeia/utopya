@extends('layouts.app')

<!-- Main Content -->
@section('content')
    @if (session('status'))
        <div class="card">{{ session('status') }}</div>
    @endif
    <div class="section">
        <form role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col s6 offset-3 input-field">
                    <input id="email" name="email" type="email" placeholder="jaimelerp@rpg.com"
                           class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ old('email') }}"
                           required>
                    <label for="email"
                           data-error="{{ $errors->has('email') ? $errors->first('email') : 'Veuillez saisir une adresse valide' }}"
                           class="{{ $errors->has('email') ? 'active' : '' }}">E-Mail</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6 col s6 offset-3">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Envoyer un e-mail de
                        réinitialisation
                        <i class="material-icons right">send</i>
                    </button>
                </div>
        </form>
    </div>
@endsection
