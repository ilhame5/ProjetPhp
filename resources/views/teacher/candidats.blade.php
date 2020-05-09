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
                    <th>Modifier Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applies as $apply)
                <tr>
                    <td>{{ $apply->student->id }}</td>
                    <td>{{ $apply->student->lastname}}</td>
                    <td>{{ $apply->student->firstname}}</td>
                    <td>
                        <a href="download" download="{{$apply}}">
                            <button type="button" class="btn btn-primary">
                                <i class="glyphicon glyphicon-download">
                                    Download
                                </i>
                            </button>
                        </a>
                    </td>
                    <td>{{ $apply->status->libelle ?? 'non fini'}}</td>
                    @if($apply->status!=NULL)
                    <td> <a href="/editCandidat?student_id={{$apply->student->id}}">Modifier</a></td>
                    <!-- <td><button class="btn btn-warning" data-toggle="modal" data-target="#editModal" data-id="{{ $apply->status->id }}" data-name="{{ $apply->status->libelle }}">Modifier</button></td> -->
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection