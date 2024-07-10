@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">EDITAR EXPEDIENTE</h1>
    <form action="{{ route('expedientes.update', $expediente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="apellidos_deudor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Apellidos</label>
                <input type="text" id="apellidos_deudor" name="apellidos_deudor" value="{{ $expediente->apellidos_deudor }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="nombres_deudor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombres</label>
                <input type="text" id="nombres_deudor" name="nombres_deudor" value="{{ $expediente->nombres_deudor }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="dni_ruc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">DNI / RUC</label>
                <input type="text" id="dni_ruc" name="dni_ruc" value="{{ $expediente->dni_ruc }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="direccion_predio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Dirección PREDIO</label>
                <input type="text" id="direccion_predio" name="direccion_predio" value="{{ $expediente->direccion_predio }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="domicilio_deudor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Domicilio</label>
                <input type="text" id="domicilio_deudor" name="domicilio_deudor" value="{{ $expediente->domicilio_deudor }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="procedencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Procedencia</label>
                <select id="procedencia" name="procedencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Seleccione</option>
                    <option value="GERENCIA DE SERVICIO DE ADMINISTRACIÓN TRIBUTARIA" @if($expediente->procedencia == "GERENCIA DE SERVICIO DE ADMINISTRACIÓN TRIBUTARIA") selected @endif>GERENCIA DE SERVICIO DE ADMINISTRACIÓN TRIBUTARIA</option>
                    <option value="GERENCIA DE DESARROLLO URBANO" @if($expediente->procedencia == "GERENCIA DE DESARROLLO URBANO") selected @endif>GERENCIA DE DESARROLLO URBANO</option>
                    <option value="GERENCIA DE TURISMO Y DESARROLLO ECONÓMICO" @if($expediente->procedencia == "GERENCIA DE TURISMO Y DESARROLLO ECONÓMICO") selected @endif>GERENCIA DE TURISMO Y DESARROLLO ECONÓMICO</option>
                    <option value="GERENCIA DE DESARROLLO HUMANO Y PARTICIPACIÓN CIUDADANA" @if($expediente->procedencia == "GERENCIA DE DESARROLLO HUMANO Y PARTICIPACIÓN CIUDADANA") selected @endif>GERENCIA DE DESARROLLO HUMANO Y PARTICIPACIÓN CIUDADANA</option>
                    <option value="GERENCIA DEL MEDIO AMBIENTE Y SERVICIOS" @if($expediente->procedencia == "GERENCIA DEL MEDIO AMBIENTE Y SERVICIOS") selected @endif>GERENCIA DEL MEDIO AMBIENTE Y SERVICIOS</option>
                    <option value="GERENCIA DE TRANSPORTES Y SEGURIDAD VIAL" @if($expediente->procedencia == "GERENCIA DE TRANSPORTES Y SEGURIDAD VIAL") selected @endif>GERENCIA DE TRANSPORTES Y SEGURIDAD VIAL</option>
                </select>
            </div>
            <div>
                <label for="fecha_notificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Notificación</label>
                <input type="date" id="fecha_notificacion" name="fecha_notificacion" value="{{ $expediente->fecha_notificacion }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="infraccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Infracción</label>
                <input type="text" id="infraccion" name="infraccion" value="{{ $expediente->infraccion }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="monto_adeudado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Monto Adeudado</label>
                <input type="text" id="monto_adeudado" name="monto_adeudado" value="{{ $expediente->monto_adeudado }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
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
