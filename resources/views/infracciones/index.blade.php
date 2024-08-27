@extends('layouts.app')

@section('content')
<div class="container">
    <h2>List of Infracciones</h2>
    <a href="{{ route('infracciones.create') }}" class="btn btn-success mb-3">Add New Infracción</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($infracciones as $infraccion)
            <tr>
                <td>{{ $infraccion->ID_infraccion }}</td>
                <td>{{ $infraccion->codigo }}</td>
                <td>{{ $infraccion->descripcion }}</td>
                <td>{{ $infraccion->monto }}</td>
                <td>
                    <a href="{{ route('infracciones.edit', $infraccion->ID_infraccion) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('infracciones.destroy', $infraccion->ID_infraccion) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
