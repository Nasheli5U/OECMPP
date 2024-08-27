@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Infraccion</h2>

    <form action="{{ route('infracciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="monto">Monto:</label>
            <input type="text" name="monto" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Infracción</button>
    </form>
</div>
@endsection
