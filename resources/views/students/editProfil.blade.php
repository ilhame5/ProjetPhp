@extends('layout')

@section('contenu')
   
    <h1>Profil</h1>
    
    <form action="/editProfil" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$student->id}}">
        <input type="hidden" name="addressid" value="{{$student->address_id}}">

        <p><input type="text" name="firstname" placeholder="Prenom" value="{{$student->firstname}}"></p>
        @if($errors->has('firstname'))
            <p>{{ $errors->first('firstname')}}</p>
        @endif
        <p><input type="text" name="lastname" placeholder="Nom" value="{{$student->lastname}}"></p>
        @if($errors->has('lastname'))
            <p>{{ $errors->first('lastname')}}</p>
        @endif
        <p><input type="date" name="birthdate" placeholder="Date de naissance" value="{{$student->birthdate}}"></p>
        @if($errors->has('birthdate'))
            <p>{{ $errors->first('birthdate')}}</p>
        @endif
        <p><input type="number" name="num" placeholder="Num" value="{{$student->num}}"></p>
        @if($errors->has('num'))
            <p>{{ $errors->first('num')}}</p>
        @endif
        <p><input type="text" name="street" placeholder="Rue" value="{{$student->address->street}}"></p>
        @if($errors->has('street'))
            <p>{{ $errors->first('street')}}</p>
        @endif
        <p><input type="number" name="zipcode" placeholder="Code postale" value="{{$student->address->zipcode}}"></p>
        @if($errors->has('zipcode'))
            <p>{{ $errors->first('zipcode')}}</p>
        @endif
        <p><input type="text" name="city" placeholder="Ville" value="{{$student->address->city}}"></p>
        @if($errors->has('city'))
            <p>{{ $errors->first('city')}}</p>
        @endif
        <p><input type="submit" value="Valider"></p>
    </form>
@endsection