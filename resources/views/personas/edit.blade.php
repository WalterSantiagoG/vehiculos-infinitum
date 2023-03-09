@extends('personas.layout')

@section('content')      
	<h3>Editar persona {{ $Persona->nombres }}</h3><br>

	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

    {!! Form::open(array('route' => ['people.update',$Persona->identificacion], 'method' => 'PUT')) !!}

	    <div class="form-group">
		    <label for="nombres">Nombres</label>
		    <input type="text" class="form-control" name="nombres" value="{{old('nombres', $Persona->nombres)}}" id="nombres" value="{{ $Persona->nombres }}" placeholder="Nombres" required="required">
		</div>
		<div class="form-group">
		  <label for="apellidos">Apellidos</label>
		  <input type="text" class="form-control" name="apellidos" value="{{old('apellidos', $Persona->apellidos)}}" id="apellidos" value="{{ $Persona->apellidos }}" placeholder="Apellidos" required="required">
		</div>
		<div class="form-group">
		  <label for="fnacimiento">Fecha de nacimiento</label>
		  <input type="date" class="form-control" name="fnacimiento" value="{{ old('fnacimiento', $Persona->fnacimiento) }}" id="fnacimiento" value="{{ $Persona->fnacimiento }}" required="required">
		</div>
		<div class="form-group">
		  <label for="identificacion">identificacion</label>
		  <input type="text" class="form-control" name="identificacion" value="{{ old('identificacion', $Persona->identificacion) }}" id="identificacion" value="{{ $Persona->identificacion }}" placeholder="identificacion" max="10" min="1" required="required" disabled>
          <small id="identificacionlHelp" class="form-text text-muted">Nunca compartiremos su identificacion con nadie más.</small>
		</div>
		<div class="form-group">
		  <label for="profesion">Profesion</label>
		  <input type="text" class="form-control" name="profesion" value="{{ old('profesion', $Persona->profesion) }}" id="profesion" value="{{ $Persona->profesion }}" placeholder="Profesion" required="required">
		</div>
		<div class="form-group">
		    <label for="casado">Casado</label>
		    <select class="form-control" name="casado" id="casado">
                <option value="{{ $Persona->casado }}" selected>"{{ $Persona->casado=="1" ? "Si" : "No";  }}"</option>
				<option value="{{0}}">No</option>
				<option value="{{1}}">Si</option>
		    </select>
		</div>
		<div class="form-group">
		  <label for="ingresosm">Ingresos mensuales</label>
		  <input type="number" class="form-control" name="ingresosm" value="{{ old('ingresosm', $Persona->ingresosm) }}" id="ingresosm" value="{{ $Persona->ingresosm }}" placeholder="Ingresos" required="required">
		</div>
	  
	  	<button type="submit" class="btn btn-primary">Actualizar</button>

	{!! Form::close() !!}
@stop