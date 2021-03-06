@extends('layout.head')

@section('menu')

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ESPACE ADMIN/ENSEIGNANT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Acceuil</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/admin/connexion">Connexion <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

</body>
@endsection
@section('contenu')
<div class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 well" id="global">
      <div class="col-sm-12 form-legend">
        <h2>Connexion</h2>
      </div>
      <div class="col-sm-12 form-column">
        <form action="/admin/connexion" method="post">
          {{csrf_field()}}



          <div class="form-group">
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{old('email')}}">
            @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email')}}</p>
            @endif
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            @if($errors->has('password'))
            <p class="text-danger">{{ $errors->first('password')}}</p>
            @endif
          </div>

          <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
      </div>
    </div>
  </div>
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
    background-color: #FAFAFA;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
  }
</style>