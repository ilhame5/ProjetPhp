@extends('layout')

@section('contenu')
<a href="/editProfil">Profil</a>

    <h1>Choix de la formation</h1>
    <form action="/ajoutFormation" method="post">
    {{csrf_field()}}
        @foreach($trainings as $training)
            <input type="radio" value ="{{ $training->id }}" name="listTraining">
            {{ $training->name }}
        @endforeach
        
        <p><input type="submit" value="Valider"></p>
    </form>
        
@endsection
<a href="/editProfil">Profil</a>
