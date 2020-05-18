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
                    <a class="nav-link" href="/deconnexion">Deconnexion </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/changePassword">Modifier mot de passe</a>
                </li>
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

@section('contenu')
<br />
<div class="container">
    <div class="row">

        <div class="col-md-8 bg-light">
            <form action="/updateCandidats" method="post" id="editForm">
                <input type="hidden" name="id" value="{{$apply->student->id}}">
                @csrf
                <label for="status">Statut du dossier de {{ $apply->student->lastname}} {{ $apply->student->firstname}}</label> : <br />
                <select class="custom-select" name="status" id="status">
                    @foreach($statuses as $status)
                    <option value="{{$status->id}}">{{$status->libelle}}</option>
                    @endforeach
                </select>
                <blockquote>
                <div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                <div>
                </blockquote>
            </form>
        </div>
    </div>
</div>
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