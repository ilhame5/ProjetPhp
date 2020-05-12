@extends('layout.head')

@section('menu')

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ESPACE ADMIN</a>
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
<center>
<div class="container" >
  <div class="row" align="justify">
    <div class="col-sm-8 col-sm-offset-2 well">
      <div class="col-sm-12 form-legend">
        <h2>Connexion</h2>
      </div>
      <div class="col-sm-12 form-column">
        <form action="/admin/connexion" method="post">
          {{csrf_field()}}



          <div class="form-group">
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{old('email')}}">
            @if($errors->has('email'))
            <p>{{ $errors->first('email')}}</p>
            @endif
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Minimum 5 caracteres">
            @if($errors->has('password'))
            <p>{{ $errors->first('password')}}</p>
            @endif
          </div>

          <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
      </div>
    </div>
  </div>
</div>
</center>


@endsection