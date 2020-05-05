@extends('layout.head')

@section('menu')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  


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
.wrapper{
  	margin: 0 auto;
  	width: 77%;
  	margin-top: 10px;
  }
</style>

@section('contenu')
    {{csrf_field()}}
    <div class="container">
				<div class="well">
                <h1>Recapitulatif de votre candidature</h1>
                </div>
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
                            <td>4 pieces jointes</td>
                            <td>{{ session('student')->apply->status->libelle }}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
        </div>
<body>
	<div class="wrapper">
		<section class="panel panel-primary">
			<div class="panel-heading">
				Votre Dossier
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<th>Fichier</th>
						<th>Nom</th>
						<th>Action</th>
					</thead>

					<tbody>
						<tr>
							<td>CV</td>
							<td>{{session('student')->apply->folder->cv }}</td>
							<td>
							<a href="download" download="{{session('student')->apply->folder->cv}}">
								<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-download">
									Download
								</i>
								</button>
							</a>
							</td>
						</tr>

						<tr>
							<td>Lettre de motivation</td>
							<td>{{session('student')->apply->folder->coverletter }}</td>
							<td>
							<a href="download" download="{{session('student')->apply->folder->coverletter}}">
								<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-download">
									Download
								</i>
								</button>
							</a>
							</td>
						</tr>

						<tr>
							<td>Capture de l'ent</td>
							<td>{{session('student')->apply->folder->screenshot }}</td>
							<td>
							<a href="download" download="{{session('student')->apply->folder->screenshot}}">
								<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-download">
									Download
								</i>
								</button>
							</a>
							</td>
						</tr>

						<tr>
							<td>Bulletins</td>
							<td>{{session('student')->apply->folder->bulletin }}</td>
							<td>
							<a href="getdownload?filename={{session('student')->apply->folder->bulletin}}">
								<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-download">
									Download
								</i>
								</button>
							</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
	</div>

</body>
@endsection