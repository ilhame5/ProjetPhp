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
                <li class="nav-item active">
                    <a class="nav-link" href="/teacherInscription">Ajout enseignant <span class="sr-only">(current)</span></a>
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
                            <h2>Ajout enseignant</h2>
                        </div>
                        <div class="col-sm-12 form-column">
                            <form action="/teacherInscription" method="post">
                                {{csrf_field()}}

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

                                <input type="submit" value="Ajouter" class="btn btn-primary">
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