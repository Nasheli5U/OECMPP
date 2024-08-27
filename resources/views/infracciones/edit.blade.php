@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Infraccion</h2>

    <form action="{{ route('infracciones.update', $infraccion->ID_infraccion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" class="form-control" value="{{ $infraccion->codigo }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" required>{{ $infraccion->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="monto">Monto:</label>
            <input type="text" name="monto" class="form-control" value="{{ $infraccion->monto }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Infracción</button>
    </form>
</div>
@endsection
