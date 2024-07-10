@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">EDITAR ESTADO DEL EXPEDIENTE</h1>
    <form action="{{ route('expedientes.update_estado', $expediente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Estado</label>
                <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Seleccione</option>
                    <option value="REC" @if($expediente->estado == "REC") selected @endif>REC</option>
                    <option value="REEF" @if($expediente->estado == "REEF") selected @endif>REEF</option>
                    <option value="RC" @if($expediente->estado == "RC") selected @endif>RC</option>
                    <option value="RSEC" @if($expediente->estado == "RSEC") selected @endif>RSEC</option>
                </select>
            </div>
            <div>
                <label for="fecha_notificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Notificación</label>
                <input type="date" id="fecha_notificacion" name="fecha_notificacion" value="{{ $expediente->fecha_notificacion }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="col-span-2">
                <label for="recibos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Recibos</label>
                <textarea id="recibos" name="recibos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-32 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $expediente->recibos }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Actualizar Estado</button>
        </div>
    </form>
</div>

@endsection
