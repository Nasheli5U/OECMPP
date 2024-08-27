@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Agregar Comprobante para el Expediente {{ $expediente->numero }}</h1>
    <form action="{{ route('comprobantes.store') }}" method="POST" id="comprobante-form">
        @csrf

        <!-- Campo oculto para ID del expediente -->
        <input type="hidden" name="ID_expediente" value="{{ $expediente->ID_expediente }}">

        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="numero_recibo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Número de Recibo</label>
                <input type="text" id="numero_recibo" name="numero_recibo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
            </div>
            <div>
                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
            </div>
            <div>
                <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Total</label>
                <input type="number" id="total" name="total" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
            </div>

            <div>
                <label for="pagos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pagos Disponibles</label>
                <ul class="list-disc pl-5">
                    @foreach($pagos as $pago)
                        <li class="flex items-center mb-2">
                            <span class="mr-2">{{ $pago->procedimiento }} - {{ $pago->monto }}</span>
                            <button type="button" class="bg-green-500 text-white px-2 py-1 rounded" data-id="{{ $pago->ID_pago }}" data-monto="{{ $pago->monto }}" onclick="agregarPago(this)">
                                Agregar
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pagos Seleccionados</label>
                <ul id="pagos-seleccionados" class="list-disc pl-5">
                    <!-- Lista de pagos seleccionados se añadirá aquí -->
                </ul>
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Agregar Comprobante</button>
        </div>
    </form>
</div>

<script>
    let total = 0;
    const pagosSeleccionadosList = document.getElementById('pagos-seleccionados');

    function agregarPago(button) {
        const pagoId = button.getAttribute('data-id');
        const monto = parseFloat(button.getAttribute('data-monto'));
        total += monto;

        // Actualizar el total en el campo
        document.getElementById('total').value = total.toFixed(2);

        // Añadir pago a la lista de pagos seleccionados
        const listItem = document.createElement('li');
        listItem.textContent = `Pago ID: ${pagoId} - Monto: ${monto.toFixed(2)}`;
        pagosSeleccionadosList.appendChild(listItem);

        // Agregar el ID del pago al formulario
        let pagosInput = document.querySelector('input[name="pagos[]"]');
        if (!pagosInput) {
            pagosInput = document.createElement('input');
            pagosInput.setAttribute('type', 'hidden');
            pagosInput.setAttribute('name', 'pagos[]');
            document.getElementById('comprobante-form').appendChild(pagosInput);
        }
        pagosInput.value = (pagosInput.value ? pagosInput.value + ',' : '') + pagoId;
    }
</script>
@endsection
