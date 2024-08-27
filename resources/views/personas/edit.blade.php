@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Persona</h2>

    <form action="{{ route('personas.update', $persona->ID_persona) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $persona->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="{{ $persona->apellido }}" required>
        </div>

        <div class="form-group">
            <label for="DNI">DNI:</label>
            <input type="text" name="DNI" class="form-control" value="{{ $persona->DNI }}" required>
        </div>

        <div class="form-group">
            <label for="RUC">RUC:</label>
            <input type="text" name="RUC" class="form-control" value="{{ $persona->RUC }}" required>
        </div>

        <div class="form-group">
            <label for="domicilio_fiscal">Domicilio Fiscal:</label>
            <input type="text" name="domicilio_fiscal" class="form-control" value="{{ $persona->domicilio_fiscal }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Persona</button>
    </form>
</div>
@endsection
