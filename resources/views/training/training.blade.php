@extends('layout')

@section('contenu')

    <h1>Les formations</h1>
    @foreach($trainings as $training)
        <input type="checkbox" value ="{{ $training->id }}" name="listTraining">
        {{ $training->name }}
    @endforeach
    <p><input type="submit" value="Valider"></p>

        
@endsection