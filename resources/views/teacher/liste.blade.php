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
                    <a class="nav-link" href="/admin/home">Acceuil </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/deconnexion">Deconnexion </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/changePassword">Modifier mot de passe</a>
                </li>
                @if(session('teacher')->email=="admin@parisnanterre.fr")
                <li class="nav-item active">
                    <a class="nav-link" href="/admin/enseignants">Liste enseignants <span class="sr-only">(current)</span></a>
                </li>
                @endif
                @if(session('teacher')->email=="admin@parisnanterre.fr")
                <li class="nav-item">
                    <a class="nav-link" href="/teacherInscription">Ajout enseignant</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/candidats">Liste candidats</a>
                </li>

            </ul>
        </div>
    </nav>

</body>
@endsection

@section('contenu')
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

<h1>Les enseignants</h1>
</p>
<button class="btn btn-success" id="btnAdd" data-toggle="modal" data-target="#addModal">Ajouter</button>
</p>

<table class="table table-striped table-sm" id="dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom de l'enseignant</th>
            <th class="not-export-col">Modifier</th>
            <th class="not-export-col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->email}}</td>
            <td class="not-export-col"><button class="btn btn-warning" data-toggle="modal" data-target="#editModal" data-id="{{ $teacher->id }}" data-name="{{ $teacher->email }}">Modifier</button></td>
            <td class="not-export-col"><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $teacher->id }}" data-name="{{ $teacher->email }}">Supprimer</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection