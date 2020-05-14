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
<div id="global">
    </br>
    <h2>Liste enseignants</h2>
    </br>
    <table class="table table-striped table-sm" id="customers" >
        <thead>
            <tr>
                <th>#</th>
                <th>Nom de l'enseignant</th>
                <th class="not-export-col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->email}}</td>
                <td class="not-export-col"><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $teacher->id }}" data-name="{{ $teacher->email }}">Supprimer</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
    .well {
        margin-top: 2%;
        font-family: Georgia, serif;
    }

    .form-legend {
        padding-bottom: 2em;
    }

    #global {
        font-family: Georgia, serif;
        margin-right: auto;
        width: 100%;
        margin-left: 50px;

    }

    #customers {
        border-collapse: collapse;
        width: 70%;
       
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #655f5c;
        color: white;
    }
</style>