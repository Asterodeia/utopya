@extends('layouts.ej')

@section('content')
    <div class="center-content">
        <h1>Nouveau message</h1>
        <h2>{{$lieu->name}}, chapitre « {{$chapitre->titre}} »</h2>
        <form action="{{url('ej/posts')}}" method="POST" class="pure-form pure-form-stacked">
            {{ csrf_field() }}
            <input type="hidden" id="chapitre_id" name="chapitre_id" value="{{$chapitre->id}}"/>
            <input type="hidden" id="lieu_id" name="lieu_id" value="{{$lieu->id}}"/>
            <label for="titre">Titre</label>
            <input id="titre" name="titre" type="text" class="validate" required>

            <label for="texte">Texte</label>
            <textarea id="texte" name="texte"></textarea>
            <button class="pure-button pure-button-primary" type="submit" name="action">Poster</button>
        </form>
    </div>
@endsection
