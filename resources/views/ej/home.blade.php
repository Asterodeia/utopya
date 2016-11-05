@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1>Les lieux</h1>
        @if (count($lieux) > 0)
            <div class="collection">
                @foreach ($lieux as $lieu)
                    <li class="collection-item">
                        <a href={{url('ej/lieux', [$lieu->id])}} class="titre">{{ $lieu->nom }}</a>
                        <p class="description">{{ $lieu->description }}</p>
                    </li>
                @endforeach
            </div>
        @endif
    </div>
@endsection
