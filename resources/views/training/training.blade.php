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
        <li class="nav-item active">
          <a class="nav-link" href="/formation">Formation <span class="sr-only">(current)</span></a>
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
    width: 730px;

  }
</style>
<div class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 well">
      <div class="col-sm-12 form-legend">
        <h2>Choix de la formation</h2>
      </div>
      <div class="col-sm-12 form-column">
        <form action="/ajoutFormation" method="post">
          {{csrf_field()}}
          @foreach($trainings as $training)
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary active">
              <input type="radio" value="{{ $training->id }}" name="listTraining" required="required" checked>
              {{ $training->name }}
            </label>
          </div>
          @endforeach
          </p>
          <div class="form-group">
            <button type="submit" style="display:none" id="buttonSubmit">Valider</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmationModal">Valider</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Validation dossier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Attention vous ne pourrez postuler qu'à une formation. Etes vous sure de vouloir postuler pour la formation ?</h6>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="$('#buttonSubmit').click()">Oui</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>
@endsection