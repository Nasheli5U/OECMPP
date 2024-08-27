@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold">Crear Pago</h1>
        <form action="{{ route('pagos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="procedimiento" class="block text-gray-700">Procedimiento</label>
                <input type="text" id="procedimiento" name="procedimiento" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="monto" class="block text-gray-700">Monto</label>
                <input type="number" id="monto" name="monto" class="form-input mt-1 block w-full" step="0.01" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
@endsection
