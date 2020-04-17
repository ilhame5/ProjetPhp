@extends('layout')

@section('contenu')

    <h1>Les etudiants</h1>
    @foreach($students as $student)
        <p>{{ $student->firstname }}</p>
    @endforeach
@endsection