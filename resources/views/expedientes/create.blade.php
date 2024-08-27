<!-- resources/views/expedientes/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">AGREGAR EXPEDIENTE</h1>

    <!-- Mostrar el número correlativo del expediente -->
    <div class="flex justify-end mb-4">
        <span class="text-xl font-semibold">N° Exp:</span>
        <span class="ml-2 px-3 py-1 bg-gray-800 text-white rounded">{{ $numero_expediente }}</span>
    </div>

    <form action="{{ route('expedientes.store') }}" method="POST">
        @csrf

        <!-- Número de Expediente (hidden) -->
        <input type="hidden" name="numero" value="{{ $numero_expediente }}">

        <div class="grid grid-cols-2 gap-4">
            <!-- Selección de Persona -->
            <div>
                <label for="ID_persona" class="block mb-2 text-sm font-medium text-gray-900">Persona</label>
                <select id="ID_persona" name="ID_persona" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="">Seleccione una Persona</option>
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->ID_persona }}">{{ $persona->nombre }} {{ $persona->apellido }} (DNI: {{ $persona->DNI }}, RUC: {{ $persona->RUC }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Dirección del Predio -->
            <div>
                <label for="direccion_predio" class="block mb-2 text-sm font-medium text-gray-900">Dirección del Predio</label>
                <input type="text" id="direccion_predio" name="direccion_predio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('direccion_predio') }}" required>
            </div>

            <!-- Selección de Procedencia -->
            <div>
                <label for="ID_procedencia" class="block mb-2 text-sm font-medium text-gray-900">Procedencia</label>
                <select id="ID_procedencia" name="ID_procedencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="">Seleccione una Procedencia</option>
                    @foreach ($procedencias as $procedencia)
                        <option value="{{ $procedencia->ID_procedencia }}">{{ $procedencia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha de Entrada -->
            <div>
                <label for="fecha_entrada" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Entrada</label>
                <input type="date" id="fecha_entrada" name="fecha_entrada" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('fecha_entrada') }}" required>
            </div>

            <!-- Fecha de Notificación -->
            <div>
                <label for="fecha_notificacion" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Notificación</label>
                <input type="date" id="fecha_notificacion" name="fecha_notificacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('fecha_notificacion') }}" required>
            </div>

            <!-- Selección de Infracción -->
            <div>
                <label for="ID_infraccion" class="block mb-2 text-sm font-medium text-gray-900">Infracción</label>
                <select id="ID_infraccion" name="ID_infraccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="">Seleccione una Infracción</option>
                    @foreach ($infracciones as $infraccion)
                        <option value="{{ $infraccion->ID_infraccion }}">{{ $infraccion->codigo }} (Monto: {{ $infraccion->monto }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Medida Complementaria -->
            <div class="col-span-2">
                <label for="medida_complementaria" class="block mb-2 text-sm font-medium text-gray-900">Medida Complementaria</label>
                <textarea id="medida_complementaria" name="medida_complementaria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="3">{{ old('medida_complementaria') }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Expediente</button>
        </div>
    </form>
</div>
@endsection
