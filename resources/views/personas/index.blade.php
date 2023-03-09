@extends('personas.layout') 

@section('content')      
      <h4>Listado de personas</h4>
      @include('flash::message')
      <table id="personas-table" class="display" style="width:100%;">
        <thead>
            <tr align="center">
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Fecha Nacimiento</th>
                <th>Identificacion</th>
                <th>Profesion</th>
                <th>Casado</th>
                <th>Ingreso Mensual</th>
                <th>Fecha Creacion</th>
            </tr>
        </thead>
        <tbody align="center" style="cursor: pointer;">
          @foreach($Persona as $Persona)
            <tr id="{{ $Persona->identificacion }}">

              <td> {{ $Persona->nombres }} </td>
              <td> {{ $Persona->apellidos }} </td>
              <td> {{ $Persona->fnacimiento }} </td>
              <td> {{ $Persona->identificacion }} </td>
              <td> {{ $Persona->profesion }} </td>
              <td> {{ $Persona->casado=='1' ? 'Si' : 'No' }} </td>
              <td> {{ $Persona->ingresosm }} </td>
              <td> {{ $Persona->created_at }} </td>
              <td>
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-lg-6">
                    <a href="{{ route('people.edit', $Persona->identificacion) }}" id="accion" class="btn btn-xs btn-info">
                      <i class="fa fa-pencil"></i>
                    </a>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-lg-6">
                    <a href="{{ route('personas.destroy', $Persona->identificacion) }}" id="accion" onclick="return confirm('¿Seguro de deseas eliminarlo? Recuerda que tambien se eliminaran los vehiculos asignados a esta persona')" class="btn btn-xs btn-danger">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </a>
                  </div>
                </div>
                
                
              </td>
            </tr> 
    
          @endforeach
        </tbody>
      </table>

      <br>
      <h4>Listado de vehiculos</h4>
      <table id="vehiculos-table" class="display" style="width:100%">
        <thead>
            <tr align="center">
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Numero de puertas</th>
                <th>Tipo de Vehiculo</th>
                <th>Propietario Actual</th>
                <th>Fecha creación</th>
                <th>Re-Asignar</th>
            </tr>
        </thead>
        <tbody align="center">
          
        </tbody>
      </table>
@stop