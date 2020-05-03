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
        <a class="nav-link" href="/">Acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/deconnexion">Deconnexion </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/editProfil">Profil </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/formation">Dossier <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

</body>
@endsection
@section('contenu')

<style>
.well {
	margin-top: 4%;
}

.form-legend {
	padding-bottom: 2em;
}

div#form {

margin: auto;
width:730px;

}
</style>
<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 well">
				<div class="col-sm-12 form-legend">
					<h2>Depot de dossier</h2>
				</div>
				<div class="col-sm-12 form-column">
                    <form action="/ajoutCandidature" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="cv">Choisissez un CV:</label>
                        <input id ="cv" name="cv" class="form-control-file" type="file" accept="application/pdf"/></p>
                    </div>
                    <div class="form-group">

                    <label for="coverletter">Choisissez une lettre de motivation:</label>
                    <p><input id ="coverletter" name="coverletter" class="form-control-file" type="file" accept="application/pdf" /></p>
                    </div>

                    <div class="form-group">
                    <label for="screenshot">Choisissez la capture d'ecran de l'ent:</label>
                    <input id ="screenshot" name="screenshot" class="form-control-file" type="file" accept="image/png, image/jpeg"/>
                    </div>

                    <div class="form-group">
                    <label for="bulletin">Choisissez un bulletin:</label>
                    <input id ="bulletin" name="bulletin" class="form-control-file" type="file" accept="application/pdf"/>
                    </div>

                    <div class="form-group">

                    <button type="submit" class="btn btn-success">Valider dossier</button>
                    </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
@endsection

