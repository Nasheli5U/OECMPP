@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Procedencia</h2>

    <form action="{{ route('procedencias.update', $procedencia->ID_procedencia) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $procedencia->nombre }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Procedencia</button>
    </form>
</div>
@endsection
