@extends('layout.head')

@section('menu')

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ESPACE ETUDIANT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/deconnexion">Deconnexion </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/validation">Dossier validé <span class="sr-only">(current)</span></a>
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

</style>
@section('contenu')
    {{csrf_field()}}
    <div class="container">
				<div class="well">
                <h1>Recapitulatif de votre candidature</h1>
				</div>
				<div class="well">
                    <div class="table-responsive">
                    <table class="table table-striped table-sm" id="dataTable">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Numero etudiant</th>
                            <th>Formation</th>
                            <th>Pieces jointes</th>
                            <th class="not-export-col">Statut</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ session('student')->lastname }}</td>
                            <td>{{ session('student')->firstname }}</td>
                            <td>{{ session('student')->num }}</td>
                            <td>{{ session('student')->apply->training->name }}</td>
                            <td>{{ session('student')->apply->folder->cv }}</td>
                            <td>{{ session('student')->apply->status->libelle }}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
        </div>
@endsection

