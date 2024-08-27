@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">EDITAR EXPEDIENTE</h1>
    <form action="{{ route('expedientes.update', $expediente->ID_expediente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="numero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Número de Expediente</label>
                <input type="text" id="numero" name="numero" value="{{ $expediente->numero }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="direccion_predio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Dirección del Predio</label>
                <input type="text" id="direccion_predio" name="direccion_predio" value="{{ $expediente->direccion_predio }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="fecha_entrada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Entrada</label>
                <input type="date" id="fecha_entrada" name="fecha_entrada" value="{{ $expediente->fecha_entrada }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
           
            <div>
                <label for="ID_persona" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Persona</label>
                <select id="ID_persona" name="ID_persona" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->ID_persona }}" @if($expediente->ID_persona == $persona->ID_persona) selected @endif>
                            {{ $persona->nombre }} {{ $persona->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="ID_procedencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Procedencia</label>
                <select id="ID_procedencia" name="ID_procedencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @foreach($procedencias as $procedencia)
                        <option value="{{ $procedencia->ID_procedencia }}" @if($expediente->ID_procedencia == $procedencia->ID_procedencia) selected @endif>
                            {{ $procedencia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="ID_infraccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Infracción</label>
                <select id="ID_infraccion" name="ID_infraccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @foreach($infracciones as $infraccion)
                        <option value="{{ $infraccion->ID_infraccion }}" @if($expediente->ID_infraccion == $infraccion->ID_infraccion) selected @endif>
                            {{ $infraccion->codigo }} ({{ $infraccion->monto }})
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-span-2">
                <label for="medida_complementaria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Medida Complementaria</label>
                <input type="text" id="medida_complementaria" name="medida_complementaria" value="{{ $expediente->medida_complementaria }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Actualizar Expediente</button>
        </div>
    </form>
</div>

@endsection
