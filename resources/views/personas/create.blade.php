@extends('personas.layout') 

@section('content')      
	<h3>Registro de personas</h3><br>

	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

    {!! Form::open(array('route' => 'people.store')) !!}

	    <div class="form-group">
		    <label for="nombres">Nombres</label>
		    <input type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" id="nombres" placeholder="Nombres" required="required">
		</div>
		<div class="form-group">
		  <label for="apellidos">Apellidos</label>
		  <input type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" id="apellidos" placeholder="Apellidos" required="required">
		</div>
		<div class="form-group">
		  <label for="fnacimiento">Fecha de nacimiento</label>
		  <input type="date" class="form-control" name="fnacimiento" value="{{ old('fnacimiento') }}" id="fnacimiento" required="required">
		</div>
		<div class="form-group">
		  <label for="identificacion">identificacion</label>
		  <input type="text" class="form-control" name="identificacion" value="{{ old('identificacion') }}" id="identificacion" placeholder="identificacion" max="10" min="1" required="required">
          <small id="identificacionlHelp" class="form-text text-muted">Nunca compartiremos su identificacion con nadie más.</small>
		</div>
		<div class="form-group">
		  <label for="profesion">Profesion</label>
		  <input type="text" class="form-control" name="profesion" value="{{ old('profesion') }}" id="profesion" placeholder="Profesion" required="required">
		</div>
		<div class="form-group">
		    <label for="casado">Casado</label>
		    <select class="form-control" name="casado" id="casado">
				<option value="{{0}}">No</option>
				<option value="{{1}}">Si</option>
		    </select>
		</div>
		<div class="form-group">
		  <label for="ingresosm">Ingresos mensuales</label>
		  <input type="number" class="form-control" name="ingresosm" value="{{ old('ingresosm') }}" id="ingresosm" placeholder="Ingresos" required="required">
		</div>
	  
	  	<button type="submit" class="btn btn-primary">Registrar</button>

	{!! Form::close() !!}
@stop