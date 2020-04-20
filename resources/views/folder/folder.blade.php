@extends('layout')

@section('contenu')

    <h1>Depot de dossier</h1>

    <form enctype="multipart/form-data" action="/ajoutCandidature" method="post">
    {{csrf_field()}}

    Selectionner les fichiers a importer: 

    <p><label>CV  <input id ="cv" name="cvUploadedfile" type="file" accept="application/pdf"/></label></p>
    <p><label>LM <input id ="coverletter" name="clUploadedfile" type="file" accept="application/pdf" /></label></p>
    <p><label>Capture d'ecran <input id ="screenshot" name="uploadedfile" type="file" accept="application/pdf"/></label></p>
    <p><label>Bulletin <input id ="bulletin" name="uploadedfile" type="file" accept="application/pdf"/></label></p>

    <p><input type="submit" value="Importer" /></p>
    </form>

@endsection
<a href="/editProfil">Profil</a>
