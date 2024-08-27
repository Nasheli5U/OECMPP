@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reportes de Expedientes</h1>

    <!-- Formulario para filtros -->
    <form action="{{ route('expedientes.reportes') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <label for="fecha_desde">Fecha desde:</label>
                <input type="date" name="fecha_desde" class="form-control" value="{{ request('fecha_desde') }}">
            </div>
            <div class="col-md-4">
                <label for="fecha_hasta">Fecha hasta:</label>
                <input type="date" name="fecha_hasta" class="form-control" value="{{ request('fecha_hasta') }}">
            </div>
            <div class="col-md-4">
                <label for="procedencia">Procedencia:</label>
                <input type="text" name="procedencia" class="form-control" value="{{ request('procedencia') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="infraccion">Infracción:</label>
                <input type="text" name="infraccion" class="form-control" value="{{ request('infraccion') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Tabla de resultados -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Número de Expediente</th>
                <th>Persona</th>
                <th>Procedencia</th>
                <th>Infracción</th>
                <th>Fecha de Entrada</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expedientes as $expediente)
                <tr>
                    <td>{{ $expediente->numero }}</td>
                    <td>{{ $expediente->persona->nombre }} {{ $expediente->persona->apellido }}</td>
                    <td>{{ $expediente->procedencia->nombre }}</td>
                    <td>{{ $expediente->infraccion->descripcion }}</td>
                    <td>{{ $expediente->fecha_entrada }}</td>
                    <td>{{ $expediente->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
