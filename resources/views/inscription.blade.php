@extends('layout')
@section('contenu')

    <h1> Inscription </h1>
    <form action="/inscription" method="post">
        {{csrf_field()}}
        <p><input type="text" name="firstname" placeholder="Prenom" value="{{old('firstname')}}"></p>
        @if($errors->has('firstname'))
            <p>{{ $errors->first('firstname')}}</p>
        @endif
        <p><input type="text" name="lastname" placeholder="Nom" value="{{old('lastname')}}"></p>
        @if($errors->has('lastname'))
            <p>{{ $errors->first('lastname')}}</p>
        @endif
        <p><input type="date" name="birthdate" placeholder="Date de naissance" value="{{old('birthdate')}}"></p>
        @if($errors->has('birthdate'))
            <p>{{ $errors->first('birthdate')}}</p>
        @endif
        <p><input type="number" name="num" placeholder="Num" value="{{old('num')}}"></p>
        @if($errors->has('num'))
            <p>{{ $errors->first('num')}}</p>
        @endif
        <p><input type="text" name="street" placeholder="Rue" value="{{old('street')}}"></p>
        @if($errors->has('street'))
            <p>{{ $errors->first('street')}}</p>
        @endif
        <p><input type="number" name="zipcode" placeholder="Code postale" value="{{old('zipcode')}}"></p>
        @if($errors->has('zipcode'))
            <p>{{ $errors->first('zipcode')}}</p>
        @endif
        <p><input type="text" name="city" placeholder="Ville" value="{{old('city')}}"></p>
        @if($errors->has('city'))
            <p>{{ $errors->first('city')}}</p>
        @endif
        <p><input type="email" name="email" placeholder="Email" value="{{old('email')}}"></p>
        @if($errors->has('email'))
            <p>{{ $errors->first('email')}}</p>
        @endif
        <p><input type="password" name="password" placeholder="Mot de passe"></p>
        @if($errors->has('password'))
            <p>{{ $errors->first('password')}}</p>
        @endif
        <p><input type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)"></p>
        @if($errors->has('password_confirmation'))
            <p>{{ $errors->first('password_confirmation')}}</p>
        @endif
        <p><input type="submit" value="M'inscrire"></p>
        
    </form>
@endsection