@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1 class="lieu-name">{{ $lieu->nom }}</h1>
        <h2 class="description">{{$lieu->description}}</h2>
        @if (count($chapitres) > 0)
            <ul class="collection">
                @foreach ($chapitres as $chapitre)
                    <li class="collection-item">
                        <a class="chapitre-name"
                           href={{url("ej/chapitres", [$chapitre->id])}}>{{ $chapitre->titre }}</a>
                        @if($chapitre->posts->count() == 1)
                            <div class="sous-entete">Un message</div>
                            <div class="sous-entete">Par <span
                                        class="perso">{{$chapitre->posts{0}->auteur->nom}}</span>
                                le {{$chapitre->posts{0}->created_at->format('j/m')}}</div>
                        @else
                            <div class="sous-entete">{{$chapitre->posts->count()}} messages</div>
                            <div class="sous-entete">Créé par
                                <span class="perso">{{$chapitre->posts{0}->auteur->nom}}</span>
                                le {{$chapitre->created_at->format('j/m')}}</div>
                            <div class="sous-entete">Dernier message par <span
                                        class="perso">{{$chapitre->posts->last()->auteur->nom}}</span>
                                le {{$chapitre->posts->last()->created_at->format('j/m')}}</div>
                        @endif

                    </li>
                @endforeach
            </ul>
        @endif
        @include('ej.posts.create', ['lieu' => $lieu, 'chapitre' => false])
    </div>
@endsection
