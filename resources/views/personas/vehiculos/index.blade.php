@extends('personas.layout') 

@section('content')      
      <h4>Listado de vehiculos</h4>
      @include('flash::message')
      <table id="vehicle-table" class="display" style="width:100%;">
        <thead>
            <tr align="center">
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Numero de puertas</th>
                <th>Tipo de vehiculo</th>
                <th>Fecha Creacion</th>
            </tr>
        </thead>
        <tbody align="center" style="cursor: pointer;">
          @foreach($Vehiculoindex as $Vehiculoindex)
            <tr id="{{ $Vehiculoindex->placa }}">

              <td> {{ $Vehiculoindex->placa }} </td>
              <td> {{ $Vehiculoindex->marca }} </td>
              <td> {{ $Vehiculoindex->modelo }} </td>
              <td> {{ $Vehiculoindex->npuertas }} </td>
              <td> {{ $Vehiculoindex->tipovh }} </td>
              <td> {{ $Vehiculoindex->created_at }} </td>
              <td>
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-lg-6">
                    <a href="{{ route('vehicle.edit', $Vehiculoindex->placa) }}" id="accion" class="btn btn-xs btn-info">
                      <i class="fa fa-pencil"></i>
                    </a>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-lg-6">
                    <a href="{{ route('vehiculos.destroy', $Vehiculoindex->placa) }}" id="accion" onclick="return confirm('¿Seguro de deseas eliminarlo? Recuerda que tambien se eliminara el historial asociado a este vehiculo')" class="btn btn-xs btn-danger">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </a>
                  </div>
                </div>
                
                
              </td>
            </tr> 
    
          @endforeach
        </tbody>
      </table>
@stop