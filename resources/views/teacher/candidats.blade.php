@extends('layout.head')

@section('menu')

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
                <a class="nav-link" href="/admin/home">Acceuil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/deconnexion">Deconnexion </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/changePassword">Modifier mot de passe</a>
            </li>
            @if(session('teacher')->email=="admin@parisnanterre.fr")
            <li class="nav-item">
                <a class="nav-link" href="/admin/enseignants">Liste enseignants </a>
            </li>
            @endif
            @if(session('teacher')->email=="admin@parisnanterre.fr")
            <li class="nav-item">
                <a class="nav-link" href="/teacherInscription">Ajout enseignant</a>
            </li>
            @endif
            <li class="nav-item active">
                <a class="nav-link" href="/candidats">Liste candidats <span class="sr-only">(current)</span></a>
            </li>

        </ul>
    </div>
</nav>
@endsection

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
@section('contenu')
<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-3">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Candidatures etudiants</h3>
                        </div>
                        <div class="form-group pull-right">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Formation</th>
                                <th>CV</th>
                                <th>Lettre de motivation</th>
                                <th>Capture de l'ent</th>
                                <th>Relevés de notes</th>
                                <th>Formulaire d’inscription</th>
                                <th>Commentaire</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applies as $apply)
                            <tr>
                                <td>{{ $apply->student->id }}</td>
                                <td>{{ $apply->student->lastname}}</td>
                                <td>{{ $apply->student->firstname}}</td>
                                <td>{{ $apply->training->name}}</td>

                                @if($apply->status!=NULL)
                                <td>
                                    <a href="getdownloadTeacher?filename={{$apply->folder->cv}}">
                                        <button type="button" class="btn btn-info btn-sm">
                                            <i class="btn btn-info btn-sm">
                                                Download
                                            </i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="getdownloadTeacher?filename={{$apply->folder->coverletter}}">
                                        <button type="button" class="btn btn-info btn-sm">
                                            <i class="btn btn-info btn-sm">
                                                Download
                                            </i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="getdownloadTeacher?filename={{$apply->folder->screenshot}}">
                                        <button type="button" class="btn btn-info btn-sm">
                                            <i class="btn btn-info btn-sm">
                                                Download
                                            </i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="getdownloadTeacher?filename={{$apply->folder->bulletin}}">
                                        <button type="button" class="btn btn-info btn-sm">
                                            <i class="btn btn-info btn-sm">
                                                Download
                                            </i>
                                        </button>
                                    </a>
                                </td>

                                <td>
                                    <a href="getdownloadTeacher?filename={{$apply->folder->bulletin}}">
                                        <button type="button" class="btn btn-info btn-sm">
                                            <i class="btn btn-info btn-sm">
                                                Download
                                            </i>
                                        </button>
                                    </a>
                                </td>
                                @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                @endif
                                @if($apply->student->commentaire!=NULL)
                                <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                                        Lire</button></td>
                                @else
                                <td></td>
                                @endif

                                @if($apply->status!=NULL)
                                <td> {{ $apply->status->libelle ?? 'Non fini'}} <br> <a href="/editCandidat?student_id={{$apply->student->id}}">Modifier</a></td>
                                <!-- <td><button class="btn btn-warning" data-toggle="modal" data-target="#editModal" data-id="{{ $apply->status->id }}" data-name="{{ $apply->status->libelle }}">Modifier</button></td> -->
                                @else
                                <td>Non fini</td>
                                @endif

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Commentaire au dossier</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <span id="deleteGroupName"></span>
                                            <p>{{$apply->student->commentaire}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('#deleteModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    var name = $(e.relatedTarget).data('name');

    $("#deleteId").val(id);
    $("#deleteGroupName").text(name);
  });
</script>
@endsection