@extends('layouts.app')

@section('content')
    <h1>Page d'accueil (HJ)</h1>
    @if (count($persos) > 0)
        <div class="collection">
            @foreach ($persos as $perso)
                <li class="collection-item">{{ $perso->name }} ({{ $perso->race }})</li>
            @endforeach
        </div>
    @endif
    <a href="/persos/create" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">perm_identity</i></a>
@endsection
