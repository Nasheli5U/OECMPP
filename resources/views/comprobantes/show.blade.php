@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Comprobante</h1>
    
    <div class="card">
        <div class="card-header">
            Comprobante #{{ $comprobante->numero_recibo }}
        </div>
        <div class="card-body">
            <p><strong>Fecha:</strong> {{ $comprobante->fecha }}</p>
            <p><strong>Total:</strong> {{ $comprobante->total }}</p>

            <h2>Pagos Asociados</h2>
            @if($comprobante->detallePagos->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pago ID</th>
                            <th>Procedimiento</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comprobante->detallePagos as $detalle)
                            <tr>
                                <td>{{ $detalle->pago->ID_pago }}</td>
                                <td>{{ $detalle->pago->procedimiento }}</td>
                                <td>{{ $detalle->monto }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay pagos asociados a este comprobante.</p>
            @endif
        </div>
    </div>

    <a href="{{ route('expedientes.edit_estado', $comprobante->ID_expediente) }}" class="btn btn-secondary mt-3">Volver a Editar Estado</a>
</div>
@endsection
