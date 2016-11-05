@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1>Nouveau
            @if($chapitre)
                message
            @else
                chapitre
            @endif
        </h1>
        <h2>{{$lieu->name}}@if($chapitre), chapitre « {{$chapitre->titre}} »@endif</h2>
        <form action="{{url('ej/posts')}}" method="POST" class="pure-form pure-form-stacked">
            {{ csrf_field() }}
            @if($chapitre)
                <input type="hidden" id="chapitre_id" name="chapitre_id" value="{{$chapitre->id}}"/>
            @endif
            <input type="hidden" id="lieu_id" name="lieu_id" value="{{$lieu->id}}"/>
            <label for="titre">Titre</label>
            <input id="titre" name="titre" type="text" class="validate" required>

            <label for="texte">Texte</label>
            <textarea id="texte" name="texte"></textarea>
            <button class="pure-button pure-button-primary" type="submit" name="action">Poster</button>
        </form>
    </div>
@endsection
