@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold">Comprobantes del Expediente {{ $expediente->ID_expediente }}</h1>

        <!-- Enlace para crear un nuevo comprobante -->
        <a href="{{ route('comprobantes.create', $expediente->ID_expediente) }}" class="inline-block bg-green-500 text-white px-4 py-2 rounded mb-4">Agregar Comprobante</a>

        @if ($comprobantes->isEmpty())
            <p>No hay comprobantes de pago para este expediente.</p>
        @else
        <!-- Tabla de comprobantes -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Número de Recibo</th>
                    <th class="py-2 px-4 border-b">Fecha</th>
                    <th class="py-2 px-4 border-b">Total</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comprobantes as $comprobante)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $comprobante->numero_recibo }}</td>
                        <td class="py-2 px-4 border-b">{{ $comprobante->fecha->format('d/m/Y') }}</td>
                        <td class="py-2 px-4 border-b">{{ $comprobante->total }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('comprobantes.show', $comprobante->ID_comprobante) }}" class="text-blue-500">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
