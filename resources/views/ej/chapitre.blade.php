@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1>Chapitre: « {{ $chapitre->titre }} »</h1>
        <h2>{{ $lieu->nom }}</h2>
        @if (count($posts) > 0)
            <div class="chapitre">
                @foreach ($posts as $post)
                    <div class="post">
                        <div class="entete">{{ $post->titre }}, par {{ $post->auteur->nom }}</div>
                        <div class="contenu">{!! nl2br($post->texte, true) !!}</div>
                    </div>
                @endforeach
            </div>
        @endif
        <a href={{url("ej/chapitres/".$chapitre->id."/posts/create")}} class="pure-button pure-button-primary">Nouveau message</a>
    </div>
@endsection
