@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1 class="lieu-name">{{ $lieu->nom }}</h1>
        <h2 class="description">{{$lieu->description}}</h2>
        @if (count($chapitres) > 0)
            <ul class="collection">
                @foreach ($chapitres as $chapitre)
                    <li class="collection-item">
                        <a class="chapitre-name" href={{url("ej/chapitres", [$chapitre->id])}}>{{ $chapitre->titre }}</a>
                        <div class="sous-entete">Créé le {{$chapitre->created_at->format('j/m')}}</div>
                        <div class="sous-entete">Modifié le {{$chapitre->updated_at->format('j/m')}}</div>
                        <div class="sous-entete">Dernier post par <span class="perso">{{$chapitre->lastPost->auteur->nom}}</span></div>
                    </li>
                @endforeach
            </ul>
        @endif
        @include('ej.posts.create', ['lieu' => $lieu, 'chapitre' => false])
    </div>
@endsection
