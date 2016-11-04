@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1>{{ $lieu->name }}</h1>
        <p>{{$lieu->description}}</p>
        @if (count($chapitres) > 0)
            <ul class="collection">
                @foreach ($chapitres as $chapitre)
                    <li class="collection-item"><a
                                href={{url("ej/chapitres", [$chapitre->id])}}>{{ $chapitre->titre }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
        <a href={{url("ej/lieux/".$lieu->id."/posts/create")}} class="pure-button pure-button-primary">Nouveau
        chapitre</a>
    </div>
@endsection
