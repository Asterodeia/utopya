@extends('layouts.ej')

@section('content')
    <div class="center-content">
        @if (count($lieux) > 0)
            <ul class="collection">
                @foreach ($lieux as $lieu)
                    <li class="collection-item">
                        <a href={{url('ej/lieux', [$lieu->id])}} class="lieu-name">{{ $lieu->nom }}</a>
                        <p class="description">{{ $lieu->description }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
