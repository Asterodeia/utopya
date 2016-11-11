@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h2 class="lieu-name"><a href="{{url("ej/lieux", $lieu->id)}}">{{ $lieu->nom }}</a></h2>
        <h1 class="chapitre-name">{{ $chapitre->titre }}</h1>
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
        @include('ej.posts.create', ['lieu' => $lieu, 'chapitre' => $chapitre])
    </div>
@endsection
