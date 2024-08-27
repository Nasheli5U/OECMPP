@extends('layouts.app')

@section('content')
<div class="container">
    <h2>List of Procedencias</h2>
    <a href="{{ route('procedencias.create') }}" class="btn btn-success mb-3">Add New Procedencia</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($procedencias as $procedencia)
            <tr>
                <td>{{ $procedencia->ID_procedencia }}</td>
                <td>{{ $procedencia->nombre }}</td>
                <td>
                    <a href="{{ route('procedencias.edit', $procedencia->ID_procedencia) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('procedencias.destroy', $procedencia->ID_procedencia) }}" method="POST" style="display:inline-block;">
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
