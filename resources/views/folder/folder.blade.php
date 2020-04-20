@extends('layout')

@section('contenu')
<a href="/editProfil">Profil</a>

    <h1>Depot de dossier</h1>

    <form action="/ajoutCandidature" method="post">
    {{csrf_field()}}
        <p><input type="submit" value="Valider"></p>
    </form>

@endsection