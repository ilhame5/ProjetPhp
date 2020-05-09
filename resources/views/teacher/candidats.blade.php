@extends('layout.head')

@section('menu')

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        @if(session('teacher')->email=="admin@parisnanterre.fr")
        <a class="navbar-brand" href="#">ESPACE ADMIN</a>
        @else
        <a class="navbar-brand" href="#">ESPACE ENSEIGNANT</a>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/home">Acceuil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/deconnexion">Deconnexion </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/changePassword">Modifier mot de passe</a>
                </li>
                @if(session('teacher')->email=="admin@parisnanterre.fr")
                <li class="nav-item">
                    <a class="nav-link" href="/admin/enseignants">Liste enseignants </a>
                </li>
                @endif
                @if(session('teacher')->email=="admin@parisnanterre.fr")
                <li class="nav-item">
                    <a class="nav-link" href="/teacherInscription">Ajout enseignant</a>
                </li>
                @endif
                <li class="nav-item active">
                    <a class="nav-link" href="/candidats">Liste candidats <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>

</body>
@endsection

<style>
    .well {
        margin-top: 2%;
    }

    .form-legend {
        padding-bottom: 2em;
    }

    div#form {

        margin: auto;
        width: 730px;

    }
</style>
@section('contenu')
<div class="container-fluid">
    <div class="row">



        <h1>Candidatures</h1>
        </p>


        <table class="table table-striped table-sm" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom de l'etudiant</th>
                    <th>Prenom de l'etudiant</th>
                    <th>Dossier</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->lastname}}</td>
                    <td>{{ $student->lastname}}</td>
                    <td>{{ $student->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection