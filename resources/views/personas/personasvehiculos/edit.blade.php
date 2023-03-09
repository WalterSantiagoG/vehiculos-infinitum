@extends('personas.layout')

@section('content')      
	<h3>Asignar propietario a vehiculo</h3><br>

	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

    {!! Form::open(array('route' => ['cambiarpropietario',$Personavehic->placa], 'method' => 'PUT')) !!}

        <div class="form-group">
		    <label for="placa">Placa</label>
		    <input type="text" class="form-control" name="placa" value="{{old('placa', $Personavehic->placa)}}" id="placa" value="{{ $Personavehic->placa }}" placeholder="placa" required="required" disabled>
		</div>
        <div class="form-group">
		    <label for="identificacion">Nuevo propietario</label>
		    <select class="form-control" name="identificacion" id="identificacion">
				<option value="{{ $Personavehic->identificacion }}" selected>{{ $Personavehic->nombres.' '.$Personavehic->apellidos }}</option>
				@foreach($Persona->all() as $persona)
					<option value="{{ $persona->identificacion }}">{{ $persona->nombres.' '.$persona->apellidos }}</option>
				@endforeach
		    </select>
		</div>
	  
	  	<button type="submit" class="btn btn-primary">Actualizar</button>

	{!! Form::close() !!}
@stop