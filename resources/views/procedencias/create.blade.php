@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Procedencia</h2>

    <form action="{{ route('procedencias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Procedencia</button>
    </form>
</div>
@endsection
