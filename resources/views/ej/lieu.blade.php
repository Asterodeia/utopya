@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1>{{ $lieu->nom }}</h1>
        <h2>{{$lieu->description}}</h2>
        @if (count($chapitres) > 0)
            <ul class="collection">
                @foreach ($chapitres as $chapitre)
                    <li class="collection-item"><a
                                href={{url("ej/chapitres", [$chapitre->id])}}>{{ $chapitre->titre }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
        @include('ej.posts.create', ['lieu' => $lieu, 'chapitre' => false])
    </div>
@endsection
