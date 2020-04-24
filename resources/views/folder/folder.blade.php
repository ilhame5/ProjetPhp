@extends('layout')

@section('contenu')

    <h1>Depot de dossier</h1>

    <form action="/ajoutCandidature" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    Selectionner les fichiers a importer: 

    <label for="cv">Choisissez un CV:</label>
    <p><input id ="cv" name="cv" type="file" accept="application/pdf"/></p>
    
    <label for="coverletter">Choisissez une lettre de motivation:</label>
    <p><input id ="coverletter" name="coverletter" type="file" accept="application/pdf" /></p>
    
    <label for="screenshot">Choisissez la capture d'ecran de l'ent:</label>
    <p><input id ="screenshot" name="screenshot" type="file" accept="image/png, image/jpeg"/></p>
    
    <label for="bulletin">Choisissez un bulletin:</label>
    <p><input id ="bulletin" name="bulletin" type="file" accept="application/pdf"/></p>

    <p><input type="submit" value="Importer" /></p>
    </form>

@endsection
<a href="/editProfil">Profil</a>
