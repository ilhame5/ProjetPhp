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
                    <a class="nav-link" href="/connexion">Connexion </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/inscription">Inscription <span class="sr-only">(current)</span></a>
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
        <div class="col-sm-8 col-sm-offset-2 well" id="global">
            <div class="col-sm-12 form-legend">
                <h2>Inscription</h2>
            </div>
            <div class="col-sm-12 form-column">
                <form action="/inscription" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Nom" value="{{old('lastname')}}">
                        @if($errors->has('lastname'))
                        <p class="text-danger">{{ $errors->first('lastname')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prenom" value="{{old('firstname')}}">
                        @if($errors->has('firstname'))
                        <p class="text-danger">{{ $errors->first('firstname')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="number" id="idCard" name="idCard" class="form-control" placeholder="Numero de carte d’identité" value="{{old('idCard')}}">
                        @if($errors->has('idCard'))
                        <p class="text-danger">{{ $errors->first('idCard')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Date de naissance</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{old('birthdate')}}">
                        @if($errors->has('birthdate'))
                        <p class="text-danger">{{ $errors->first('birthdate')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="number" id="numero" name="num" class="form-control" placeholder="Numero de telephone" value="{{old('num')}}">
                        @if($errors->has('num'))
                        <p class="text-danger">{{ $errors->first('num')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="text" id="rue" name="street" class="form-control" placeholder="Rue" value="{{old('street')}}">
                        @if($errors->has('street'))
                        <p class="text-danger">{{ $errors->first('street')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="text" id="city" name="city" class="form-control" placeholder="Ville" value="{{old('city')}}">
                        @if($errors->has('city'))
                        <p class="text-danger">{{ $errors->first('city')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="number" id="cp" name="zipcode" class="form-control" placeholder="Code postal" value="{{old('zipcode')}}">
                        @if($errors->has('zipcode'))
                        <p class="text-danger">{{ $errors->first('zipcode')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                        @if($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Minimum 5 caracteres">
                        @if($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirmation mot de passe" class="form-control">
                        @if($errors->has('password_confirmation'))
                        <p class="text-danger">{{ $errors->first('password_confirmation')}}</p>
                        @endif
                    </div>

                    <input type="submit" value="M'inscrire" class="btn btn-primary">
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