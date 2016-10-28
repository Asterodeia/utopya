@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1>Les lieux</h1>
        @if (count($lieux) > 0)
            <div class="collection">
                @foreach ($lieux as $lieu)
                    <li class="collection-item">{{ $lieu->name }} ({{ $lieu->description }})</li>
                @endforeach
            </div>
        @endif
    </div>
@endsection
