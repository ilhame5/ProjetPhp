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
                <li class="nav-item active">
                    <a class="nav-link" href="/Changepassword">Modifier mot de passe <span class="sr-only">(current)</span></a>
                </li>
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
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 well">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 well">
                        <div class="col-sm-12 form-legend">
                            <h2>Nouveau mot de passe</h2>
                        </div>
                        <div class="col-sm-12 form-column">
                            <form action="/changePassword" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$teacher->id}}">

                                <div class="form-group">
                                    <label for="password">Nouveau mot de passe </label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Minimum 5 caracteres">
                                    @if($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">Mot de passe (confirmation)</label>
                                    <input type="password" id="password" name="password_confirmation" class="form-control">
                                    @if($errors->has('password_confirmation'))
                                    <p class="text-danger">{{ $errors->first('password_confirmation')}}</p>
                                    @endif
                                </div>

                                <input type="submit" value="Modifier mon mot de passe" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
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