@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
  <h2 class="text-2xl font-bold mb-6 text-center">REPORTES</h2>

  <form action="{{ route('expedientes.reportes') }}" method="GET">
    <div class="mb-4">
      <label class="block font-medium mb-1">POR FECHA</label>
      <div class="flex space-x-2">
        <div class="relative w-full">
          <input type="date" name="fecha_desde" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Desde">
          <span class="absolute right-3 top-1/2 -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </span>
        </div>
        <div class="relative w-full">
          <input type="date" name="fecha_hasta" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Hasta">
          <span class="absolute right-3 top-1/2 -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </span>
        </div>
      </div>
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1">POR PROCEDENCIA</label>
      <input type="text" name="procedencia" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ingrese procedencia">
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1">POR INFRACCIÓN</label>
      <input type="text" name="infraccion" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ingrese infracción">
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1">POR COMPROBANTES</label>
      <input type="text" name="comprobante" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ingrese comprobante">
    </div>

    <div class="flex justify-center">
      <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Generar reporte</button>
    </div>
  </form>

  @if(isset($expedientes) && $expedientes->isNotEmpty())
    <div class="mt-6">
      <h3 class="text-xl font-bold mb-4">Resultados:</h3>
      <table class="min-w-full bg-white">
        <thead>
          <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Número</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Nombres</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">DNI/RUC</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Dirección del Predio</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Procedencia</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Fecha de Notificación</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Infracción</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Monto</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">Estado</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($expedientes as $expediente)
            <tr>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->numero_expediente }}</td>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->nombres }}</td>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->dni_ruc }}</td>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->direccion_predio }}</td>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->procedencia }}</td>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->fecha_notificacion }}</td>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->infraccion }}</td>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->monto_adeudado }}</td>
              <td class="px-6 py-4 border-b border-gray-300">{{ $expediente->estado }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="mt-6">
      <h3 class="text-xl font-bold mb-4">No se encontraron resultados.</h3>
    </div>
  @endif
  
</div>
@endsection
