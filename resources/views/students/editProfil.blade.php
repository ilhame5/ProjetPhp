@extends('layout.head')

@section('menu')

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
width:730px;

}
</style>

<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 well">
				<div class="col-sm-12 form-legend">
					<h2>Profil</h2>
				</div>
				<div class="col-sm-12 form-column">
					<form action="/editProfil" method="post">
                    {{csrf_field()}}

                        <input type="hidden" name="id" value="{{$student->id}}">
                        <input type="hidden" name="addressid" value="{{$student->address_id}}">

                        <div class="form-group">
                            <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Nom" value="{{$student->lastname}}" >
                            @if($errors->has('lastname'))
                                <p>{{ $errors->first('lastname')}}</p>
                            @endif
                        </div>

						<div class="form-group">
                            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prenom" value="{{$student->firstname}}">
                            @if($errors->has('firstname'))
                                <p>{{ $errors->first('firstname')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{$student->birthdate}}">
                            @if($errors->has('birthdate'))
                                <p>{{ $errors->first('birthdate')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="number" id="numero" name="num" class="form-control" placeholder="Numero de telephone" value="{{$student->num}}">
                            @if($errors->has('num'))
                                <p>{{ $errors->first('num')}}</p>
                            @endif
                        </div>
                       
                        <div class="form-group">
                            <input type="text" id="rue" name="street" class="form-control" placeholder="Rue" value="{{$student->address->street}}">
                            @if($errors->has('street'))
                                <p>{{ $errors->first('street')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
							<input type="text" id="city" name="city" class="form-control" placeholder="Ville" value="{{$student->address->city}}">
                            @if($errors->has('city'))
                                <p>{{ $errors->first('city')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="number" id="cp" name="zipcode" class="form-control" placeholder="Code postal" value="{{$student->address->zipcode}}">
                            @if($errors->has('zipcode'))
                                <p>{{ $errors->first('zipcode')}}</p>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Enrengistrer</button>
					</form>
				</div>
			</div>
        </div>
    </div>
@endsection
