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
                    <a class="nav-link" href="/candidature">Dossier <span class="sr-only">(current)</span></a>
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
            <div class="col-sm-12 form-legend">
                <h2>Depot de dossier</h2>
            </div>
            <div class="col-sm-12 form-column">
                <form action="/ajoutCandidature" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="cv">Choisissez un CV:</label>
                        <input id="cv" name="cv" class="form-control-file" type="file" required accept="application/pdf" /></p>
                    </div>
                    <div class="form-group">

                        <label for="coverletter">Choisissez une lettre de motivation:</label>
                        <p><input id="coverletter" name="coverletter" class="form-control-file" type="file" required accept="application/pdf" /></p>
                    </div>

                    <div class="form-group">
                        <label for="screenshot">Choisissez la capture d'ecran de l'ent:</label>
                        <input id="screenshot" name="screenshot" class="form-control-file" type="file" required accept="image/png, image/jpeg" />
                    </div>

                    <div class="form-group">
                        <label for="bulletin">Choisissez un bulletin:</label>
                        <input id="bulletin" name="bulletin" class="form-control-file" type="file" required accept="application/pdf" />
                    </div>

                    <div class="form-group">
                        <label for="registrationForm">Choisissez le formulaire d’inscription rempli :</label>
                        <input id="registrationForm" name="registrationForm" class="form-control-file" type="file" required accept="application/pdf" />
                    </div>

                    <div class="form-group">
                        <button type="submit" style="display:none" id="buttonSubmit">Valider dossier</button>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmationModal">Valider dossier</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Laisser un Commentaire</button>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Laisser un Commentaire</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="msg">Message :</label>
                                    <textarea id="msg" name="commentaire" rows="4" cols="40"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Enrengistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                <h6> Une fois validé, le dossier sera envoyé pour traitement. Voulez-vous valider votre dossier ? </h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="$('#buttonSubmit').click()">Oui</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Non</button>
            </div>
        </div>
    </div>
</div>
@endsection

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