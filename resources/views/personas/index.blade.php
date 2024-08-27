@extends('layouts.app')

@section('content')
<div class="container">
    <h2>List of Personas</h2>
    <a href="{{ route('personas.create') }}" class="btn btn-success mb-3">Add New Persona</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>RUC</th>
                <th>Domicilio Fiscal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
            <tr>
                <td>{{ $persona->ID_persona }}</td>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->apellido }}</td>
                <td>{{ $persona->DNI }}</td>
                <td>{{ $persona->RUC }}</td>
                <td>{{ $persona->domicilio_fiscal }}</td>
                <td>
                    <a href="{{ route('personas.edit', $persona->ID_persona) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('personas.destroy', $persona->ID_persona) }}" method="POST" style="display:inline-block;">
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
