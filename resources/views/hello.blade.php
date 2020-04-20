@extends('layout')

@section('contenu')
    {{csrf_field()}}
    <h1>Hello</h1>
    @php
    dd(session('student')->apply->training->name);
    @endphp

@endsection