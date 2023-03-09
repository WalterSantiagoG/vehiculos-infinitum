<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{ route('personas.index') }}">Concesionario Infinitum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('personas.index') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('vehicle.index') }}"> Ver vehiculos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('people.create') }}">Crear Persona</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('vehicle.create') }}">Crear vehiculo</a>
            </li>
          </ul>
        </div>
      </nav>