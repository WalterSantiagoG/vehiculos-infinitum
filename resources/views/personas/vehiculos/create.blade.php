@extends('personas.layout') 

@section('content')
	<h3>Registro de vehiculos</h3><br>

	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

    {!! Form::open(array('route' => 'vehicle.store')) !!} {{--$Vehiculo --}}

		<div class="form-group">
		    <label for="identificacion">Propietario</label>
		    <select class="form-control" name="identificacion" id="identificacion">
		    	@foreach($Persona->all() as $persona)
					<option value="{{ $persona->identificacion }}">{{ $persona->nombres.' '.$persona->apellidos }}</option>
				@endforeach
		    </select>
		</div>
	    <div class="form-group">
		    <label for="placa">Placa</label>
		    <input type="text" class="form-control" name="placa" value="{{ old('placa') }}" id="placa" placeholder="Placa" required="required" maxlength="6" minlength="6">
		</div>
        <div class="form-group">
		  <label for="marca">Marca</label>
		  <input type="text" class="form-control" name="marca" value="{{ old('marca') }}" id="marca" placeholder="Marca" required="required">
		</div>
		<div class="form-group">
		  <label for="modelo">Modelo</label>
		  <input type="text" class="form-control" name="modelo" value="{{ old('modelo') }}" id="modelo" placeholder="modelo" required="required">
		</div>
		<div class="form-group">
		  <label for="npuertas">Numero de puertas</label>
		  <input type="number" class="form-control" name="npuertas" value="{{ old('npuertas') }}" id="npuertas" placeholder="Numero de puertas" required="required">
		</div>
        <div class="form-group">
		  <label for="tipovh">Tipo de vehiculo</label>
		  <input type="text" class="form-control" name="tipovh" value="{{ old('tipovh') }}" id="tipovh" placeholder="Tipo de Vehiculo" required="required">
		</div>
		
	  	<button type="submit" class="btn btn-primary">Registrar</button>

	{!! Form::close() !!}
@stop