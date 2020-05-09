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
        <li class="nav-item active">
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

<div class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 well">
      <div class="col-sm-12 form-legend">
        <h2>Bienvenue sur l'espace Enseignant</h2>
      </div>

    </div>
  </div>
</div>

@endsection