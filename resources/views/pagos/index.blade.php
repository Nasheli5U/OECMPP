@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold">Listado de Pagos</h1>
        <a href="{{ route('pagos.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4">Agregar Pago</a>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Procedimiento</th>
                    <th class="py-2 px-4 border-b">Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $pago->ID_pago }}</td>
                        <td class="py-2 px-4 border-b">{{ $pago->procedimiento }}</td>
                        <td class="py-2 px-4 border-b">{{ $pago->monto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
