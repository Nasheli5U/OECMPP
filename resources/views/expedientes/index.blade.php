@extends('layouts.app')

@section('content')
<div class="container">
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <div>
                <!-- Dropdown para filtrar -->
                <div>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                        </svg>
                        Últimos 30 días
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                            <li>
                                <!-- Opciones de filtro -->
                                <!-- ... -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Barra de búsqueda -->
            <div>
                <label for="table-search" class="sr-only">Buscar</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar expedientes">
                </div>
            </div>
        </div>
        <!-- Tabla de expedientes -->
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Número de Expediente</th>
                    <th scope="col" class="px-6 py-3">Nombre Completo</th>
                    <th scope="col" class="px-6 py-3">DNI/RUC</th>
                    <th scope="col" class="px-6 py-3">Domicilio Fiscal</th>
                    <th scope="col" class="px-6 py-3">Dirección del Predio</th>
                    <th scope="col" class="px-6 py-3">Procedencia</th>
                    <th scope="col" class="px-6 py-3">Fecha de Notificación</th>
                    <th scope="col" class="px-6 py-3">Código Infracción</th>
                    <th scope="col" class="px-6 py-3">Monto</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expedientes as $expediente)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $expediente->numero }}</td>
                    <td class="px-6 py-4">{{ $expediente->persona->nombre }} {{ $expediente->persona->apellido }}</td>
                    <td class="px-6 py-4">{{ $expediente->persona->DNI ?? $expediente->persona->RUC }}</td>
                    <td class="px-6 py-4">{{ $expediente->persona->domicilio_fiscal }}</td>
                    <td class="px-6 py-4">{{ $expediente->direccion_predio }}</td>
                    <td class="px-6 py-4">{{ $expediente->procedencia->nombre }}</td>
                    <td class="px-6 py-4">{{ $expediente->fecha_notificacion }}</td>
                    <td class="px-6 py-4">{{ $expediente->infraccion->codigo }}</td>
                    <td class="px-6 py-4">{{ $expediente->infraccion->monto }}</td>
                    <td class="px-6 py-4">{{ $expediente->estado }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <!-- Botones de acción -->
                        <a href="{{ route('expedientes.edit', $expediente->ID_expediente) }}" class="btn-editar">
                            Editar Datos
                        </a>
                        <a href="{{ route('expedientes.edit_estado', $expediente->ID_expediente) }}" class="btn-editar">
                            Editar Estado
                        </a>
                        <form action="{{ route('expedientes.destroy', $expediente->ID_expediente) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-eliminar" onclick="return confirm('¿Estás seguro de eliminar este expediente?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
