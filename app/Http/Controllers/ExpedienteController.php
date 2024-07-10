<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::all();
        return view('expedientes.index', compact('expedientes'));
    }

    public function show(Expediente $expediente)
    {
        return view('reportes', compact('expediente'));
    }

    public function create()
    {
        $numero_expediente = $this->generateExpedienteNumber();

        return view('expedientes.create', compact('numero_expediente'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'apellidos_deudor' => 'required|string|max:255',
            'nombres_deudor' => 'required|string|max:255',
            'dni_ruc' => 'required|string|max:20',
            'direccion_predio' => 'required|string|max:255',
            'domicilio_deudor' => 'required|string|max:255',
            'procedencia' => 'required|string|max:255',
            'fecha_notificacion' => 'required|date',
            'infraccion' => 'required|string|max:255',
            'monto_adeudado' => 'required|numeric',
            'medida_complementaria' => 'nullable|string|max:255',
        ]);

        // Creación del expediente
        Expediente::create([
            'numero_expediente' => $request->numero_expediente,
            'apellidos_deudor' => $request->apellidos_deudor,
            'nombres_deudor' => $request->nombres_deudor,
            'dni_ruc' => $request->dni_ruc,
            'direccion_predio' => $request->direccion_predio,
            'domicilio_deudor' => $request->domicilio_deudor,
            'procedencia' => $request->procedencia,
            'fecha_notificacion' => $request->fecha_notificacion,
            'infraccion' => $request->infraccion,
            'monto_adeudado' => $request->monto_adeudado,
            'medida_complementaria' => $request->medida_complementaria,
        ]);

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('expedientes.index')->with('success', 'Expediente creado exitosamente.');
    }

    private function generateExpedienteNumber()
    {
        // Obtén el último expediente creado
        $lastExpediente = Expediente::orderBy('id', 'desc')->first();

        // Incrementa el número de expediente
        if ($lastExpediente) {
            $lastNumber = intval(substr($lastExpediente->numero_expediente, 0, 4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        // Genera el nuevo número de expediente
        $currentYear = date('Y');
        return "{$newNumber}-{$currentYear}-OEC";
    }

    public function editEstado($id)
    {
        $expediente = Expediente::findOrFail($id);
        return view('expedientes.edit_estado', compact('expediente'));
    }

    // Función para actualizar el estado del expediente
    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string|in:REC,REEF,RC,RSEC',
            'fecha_notificacion' => 'required|date',
            'recibos' => 'nullable|string|max:255',
        ]);

        $expediente = Expediente::findOrFail($id);
        $expediente->estado = $request->estado;
        $expediente->fecha_notificacion = $request->fecha_notificacion;
        $expediente->recibos = $request->recibos;
        $expediente->save();

        return redirect()->route('expedientes.index')->with('success', 'Estado del expediente actualizado con éxito');
    }

    public function edit($id)
    {
        $expediente = Expediente::findOrFail($id);
        return view('expedientes.edit', compact('expediente'));
    }

    // Función para actualizar los datos del expediente
    public function update(Request $request, $id)
    {
        $request->validate([
            'apellidos_deudor' => 'required|string|max:255',
            'nombres_deudor' => 'required|string|max:255',
            'dni_ruc' => 'required|string|max:20',
            'direccion_predio' => 'required|string|max:255',
            'domicilio_deudor' => 'required|string|max:255',
            'procedencia' => 'required|string|max:255',
            'fecha_notificacion' => 'required|date',
            'infraccion' => 'required|string|max:255',
            'monto_adeudado' => 'required|numeric',
            'medida_complementaria' => 'nullable|string|max:255',
        ]);

        $expediente = Expediente::findOrFail($id);
        $expediente->update($request->all());

        return redirect()->route('expedientes.index')->with('success', 'Expediente actualizado con éxito');
    }

    public function edit_estado($id)
{
    $expediente = Expediente::findOrFail($id);
    return view('expedientes.edit_estado', compact('expediente'));
}


    public function destroy($id)
    {
        $expediente = Expediente::findOrFail($id);
        $expediente->delete();

        return redirect()->route('expedientes.index')->with('success', 'Expediente eliminado con éxito');
    }

    public function reportes(Request $request)
    {
        // Obtener los filtros del formulario
        $fecha_desde = $request->input('fecha_desde');
        $fecha_hasta = $request->input('fecha_hasta');
        $procedencia = $request->input('procedencia');
        $infraccion = $request->input('infraccion');
        $comprobante = $request->input('comprobante');

        // Construir la consulta
        $query = Expediente::query();

        if ($fecha_desde) {
            $query->where('fecha_notificacion', '>=', $fecha_desde);
        }
        if ($fecha_hasta) {
            $query->where('fecha_notificacion', '<=', $fecha_hasta);
        }
        if ($procedencia) {
            $query->where('procedencia', 'like', "%$procedencia%");
        }
        if ($infraccion) {
            $query->where('infraccion', 'like', "%$infraccion%");
        }
        if ($comprobante) {
            $query->whereHas('comprobantes', function ($q) use ($comprobante) {
                $q->where('numero_comprobante', 'like', "%$comprobante%");
            });
        }

        // Obtener los resultados
        $expedientes = $query->get();

        // Retornar la vista con los resultados
        return view('expedientes.reportes', compact('expedientes'));
    }

}
