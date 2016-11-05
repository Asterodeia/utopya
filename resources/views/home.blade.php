@extends('layouts.hj')

@section('content')
    <div class="center-content">
        <h1>Accueil</h1>
        @if(session('message'))
            <div class="message">
                {{ session('message') }}
            </div>
        @endif
        @if (count($persos) > 0)
            <div class="collection">
                @foreach ($persos as $perso)
                    <li class="collection-item pure-g">
                        <div class="pure-u-4-5">{{ $perso->name }} ({{ $perso->race }})</div>
                        <div class="pure-u-1-5"><a href={{url('persos/play', [$perso->id])}} class="pure-button play">Jouer</a>
                        </div>
                    </li>
                @endforeach
            </div>
        @endif
        <a href={{url("/persos/create")}} class="pure-button pure-button-primary">Nouveau personnage</a>
    </div>
@endsection
