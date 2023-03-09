@extends('personas.layout')

@section('content')      
	<h3>Editar Vehiculo {{ $Vehiculo->placa }}</h3><br>

	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

    {!! Form::open(array('route' => ['vehicle.update',$Vehiculo->placa], 'method' => 'PUT')) !!}

	    <div class="form-group">
		    <label for="placa">Placa</label>
		    <input type="text" class="form-control" name="placa" value="{{old('placa', $Vehiculo->placa)}}" id="placa" value="{{ $Vehiculo->placa }}" placeholder="placa" required="required" disabled>
		</div>
		<div class="form-group">
		  <label for="marca">Marca</label>
		  <input type="text" class="form-control" name="marca" value="{{old('marca', $Vehiculo->marca)}}" id="marca" value="{{ $Vehiculo->marca }}" placeholder="marca" required="required">
		</div>
		<div class="form-group">
		  <label for="modelo">Modelo</label>
		  <input type="text" class="form-control" name="modelo" value="{{ old('modelo', $Vehiculo->modelo) }}" id="modelo" value="{{ $Vehiculo->modelo }}" placeholder="identificacion" max="10" min="1" required="required">
		</div>
		<div class="form-group">
		  <label for="npuertas">Numero de puertas</label>
		  <input type="text" class="form-control" name="npuertas" value="{{ old('npuertas', $Vehiculo->npuertas) }}" id="npuertas" value="{{ $Vehiculo->npuertas }}" placeholder="npuertas" required="required">
		</div>
        <div class="form-group">
		  <label for="tipovh">Tipo de vehiculo</label>
		  <input type="text" class="form-control" name="tipovh" value="{{ old('tipovh', $Vehiculo->tipovh) }}" id="tipovh" value="{{ $Vehiculo->tipovh }}" placeholder="tipovh" required="required">
		</div>
	  
	  	<button type="submit" class="btn btn-primary">Actualizar</button>

	{!! Form::close() !!}
@stop