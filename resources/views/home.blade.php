@extends('layouts.hj')

@section('content')
    <div class="center-content">
    <h1>Accueil</h1>
    @if (count($persos) > 0)
        <div class="collection">
            @foreach ($persos as $perso)
                <li class="collection-item">{{ $perso->name }} ({{ $perso->race }})</li>
            @endforeach
        </div>
    @endif
    <a href="/persos/create" class="pure-button pure-button-primary">Nouveau perso</a>
    </div>
@endsection
