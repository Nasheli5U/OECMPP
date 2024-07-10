@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">AGREGAR EXPEDIENTE</h1>
    <div class="flex justify-end mb-4">
        <span class="text-xl font-semibold">N° Exp.:</span>
        <span class="ml-2 px-3 py-1 bg-gray-800 text-white rounded">{{ $numero_expediente }}</span>
    </div>
    <form action="{{ route('expedientes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="numero_expediente" value="{{ $numero_expediente }}">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Apellidos</label>
                <input type="text" id="apellidos_deudor" name="apellidos_deudor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombres</label>
                <input type="text" id="nombres_deudor" name="nombres_deudor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="dni_ruc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">DNI / RUC</label>
                <input type="text" id="dni_ruc" name="dni_ruc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="direccion_predio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Dirección PREDIO</label>
                <input type="text" id="direccion_predio" name="direccion_predio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="domicilio_deudor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Domicilio</label>
                <input type="text" id="domicilio_deudor" name="domicilio_deudor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="procedencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Procedencia</label>
                <select id="procedencia" name="procedencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Seleccione</option>
                    <option value="GERENCIA DE SERVICIO DE ADMINISTRACIÓN TRIBUTARIA">GERENCIA DE SERVICIO DE ADMINISTRACIÓN TRIBUTARIA</option>
                    <option value="GERENCIA DE DESARROLLO URBANO">GERENCIA DE DESARROLLO URBANO</option>
                    <option value="GERENCIA DE TURISMO Y DESARROLLO ECONÓMICO">GERENCIA DE TURISMO Y DESARROLLO ECONÓMICO</option>
                    <option value="GERENCIA DE DESARROLLO HUMANO Y PARTICIPACIÓN CIUDADANA">GERENCIA DE DESARROLLO HUMANO Y PARTICIPACIÓN CIUDADANA</option>
                    <option value="GERENCIA DEL MEDIO AMBIENTE Y SERVICIOS">GERENCIA DEL MEDIO AMBIENTE Y SERVICIOS</option>
                    <option value="GERENCIA DE TRANSPORTES Y SEGURIDAD VIAL">GERENCIA DE TRANSPORTES Y SEGURIDAD VIAL</option>
                </select>
            </div>
            <div>
                <label for="fecha_notificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha</label>
                <input type="date" id="fecha_notificacion" name="fecha_notificacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ date('Y-m-d') }}" required />
            </div>
            <div>
                <label for="infraccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Infracción</label>
                <input type="text" id="infraccion" name="infraccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="monto_adeudado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Monto</label>
                <input type="text" id="monto_adeudado" name="monto_adeudado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="resolucion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Resolución</label>
                <select id="resolucion" name="resolucion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccione</option>
                    <option value="R.G.">R.G.</option>
                    <option value="R.G.M.">R.G.M.</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="medida_complementaria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Medida complementaria</label>
                <input type="text" id="medida_complementaria" name="medida_complementaria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Generar portada</button>
        </div>
    </form>
</div>


@endsection
