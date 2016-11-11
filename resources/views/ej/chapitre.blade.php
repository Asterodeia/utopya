@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1>Chapitre: « {{ $chapitre->titre }} »</h1>
        <h2><a href="{{url("ej/lieux", $lieu->id)}}">{{ $lieu->nom }}</a></h2>
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
