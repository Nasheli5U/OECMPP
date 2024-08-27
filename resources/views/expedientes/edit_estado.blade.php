@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Editar Estado del Expediente</h1>
    <form action="{{ route('expedientes.update_estado', $expediente->ID_expediente) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Estado</label>
                <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="REC" @if($expediente->estado == 'REC') selected @endif>REC</option>
                    <option value="REEF" @if($expediente->estado == 'REEF') selected @endif>REEF</option>
                    <option value="RC" @if($expediente->estado == 'RC') selected @endif>RC</option>
                    <option value="RSEC" @if($expediente->estado == 'RSEC') selected @endif>RSEC</option>
                </select>
            </div>
            <div>
                <label for="fecha_notificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Notificación</label>
                <input type="date" id="fecha_notificacion" name="fecha_notificacion" value="{{ $expediente->fecha_notificacion }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <!-- Otros campos según sea necesario -->
            <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Actualizar Estado</button>
        </div>
    </form>

    <h2>Comprobantes Asociados</h2>
    @if($comprobantes->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Número de Recibo</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comprobantes as $comprobante)
                    <tr>
                        <td>{{ $comprobante->numero_recibo }}</td>
                        <td>{{ $comprobante->fecha }}</td>
                        <td>{{ $comprobante->total }}</td>
                        <td>
                            <a href="{{ route('comprobantes.show', $comprobante->ID_comprobante) }}" class="btn btn-info">Ver Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay comprobantes asociados a este expediente.</p>
    @endif

    <div class="mt-6">
        <a href="{{ route('comprobantes.create', $expediente->ID_expediente) }}" class="bg-green-500 text-white py-2 px-4 rounded">Agregar Comprobante</a>
    </div>
</div>
@endsection
