@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Persona</h2>

    <form action="{{ route('personas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="DNI">DNI:</label>
            <input type="text" name="DNI" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="RUC">RUC:</label>
            <input type="text" name="RUC" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="domicilio_fiscal">Domicilio Fiscal:</label>
            <input type="text" name="domicilio_fiscal" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Crear Persona</button>
    </form>
</div>
@endsection
