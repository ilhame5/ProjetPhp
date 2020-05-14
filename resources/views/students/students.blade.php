@extends('layout')

@section('contenu')

    <h1>Les etudiants</h1>

    <table class="table table-striped table-sm" id="dataTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom de l'etudiant</th>
        <th class="not-export-col">Modifier</th>
        <th class="not-export-col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->firstname }}</td>
        <td class="not-export-col"><button class="btn btn-warning" data-toggle="modal" data-target="#editModal" data-id="{{ $student->id }}" data-name="{{ $student->name }}">Modifier</button></td>
        <td class="not-export-col"><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $student->id }}" data-name="{{ $student->name }}">Supprimer</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection