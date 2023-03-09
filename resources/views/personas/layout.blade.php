<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Walter Jesus Santiago Gonzalez">
  <title>Vehiculos Infinitum</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap4/css/bootstrap.min.css') }}">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
  <link rel="stylesheet" href="{{ asset('bootstrap4/font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
    <header>
      @include('personas.partials.nav')
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <div align="center">
        <h1 class="mt-5">Concesionario Infinitum</h1>
      </div>
    </main>
    <div>
      
    </div>

    <div class="container">
      @yield('content')
    </div>

    @include('personas.partials.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    {{--<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
  <script type="text/javascript" src="{{ asset('bootstrap4/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bootstrap4/js/popper.min.js') }}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/concesionario.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#personas-table').DataTable({
          "scrollY":        "200px",
          "scrollX":        "200px",
          "scrollCollapse": true,
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,  
        });
    });
    $(document).ready(function() {
        $('#vehiculos-table').DataTable({
          "scrollY":        "200px",
          "scrollX":        "200px",
          "scrollCollapse": true,
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,  
        });
    });
    $(document).ready(function() {
        $('#vehicle-table').DataTable({
          "scrollY":        "200px",
          "scrollX":        "200px",
          "scrollCollapse": true,
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,  
        });
    });
  </script>
</body>
</html>