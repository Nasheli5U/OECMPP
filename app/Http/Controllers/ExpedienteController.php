<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Persona;
use App\Models\Procedencia;
use App\Models\Infraccion;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::with('persona', 'procedencia', 'infraccion')->get();
        return view('expedientes.index', compact('expedientes'));
    }

    public function show(Expediente $expediente)
    {
        return view('expedientes.show', compact('expediente'));
    }

    public function create()
    {
        $personas = Persona::all();
        $procedencias = Procedencia::all();
        $infracciones = Infraccion::all();
        $numero_expediente = $this->generateExpedienteNumber();



        return view('expedientes.create', compact('personas', 'procedencias', 'infracciones', 'numero_expediente'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'ID_persona' => 'required|exists:personas,ID_persona',
            'direccion_predio' => 'required|string|max:255',
            'ID_procedencia' => 'required|exists:procedencias,ID_procedencia',
            'fecha_entrada' => 'required|date',
            'fecha_notificacion' => 'nullable|date',
            'ID_infraccion' => 'required|exists:infracciones,ID_infraccion',
            'estado' => 'nullable|string|in:REC,REEF,RC,RSEC', // Asegúrate de permitir nulo
            'medida_complementaria' => 'nullable|string|max:255',
        ]);

        // Creación del expediente
        Expediente::create([
            'numero' => $this->generateExpedienteNumber(),
            'ID_persona' => $request->ID_persona,
            'direccion_predio' => $request->direccion_predio,
            'ID_procedencia' => $request->ID_procedencia,
            'fecha_entrada' => $request->fecha_entrada,
            'fecha_notificacion' => $request->fecha_notificacion,
            'ID_infraccion' => $request->ID_infraccion,
            'estado' => $request->estado ?? 'REC', // Establece 'REC' por defecto si no se proporciona
            'medida_complementaria' => $request->medida_complementaria,
        ]);

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('expedientes.index')->with('success', 'Expediente creado exitosamente.');
    }

    
    private function generateExpedienteNumber()
    {
        // Obtén el último expediente creado
        $lastExpediente = Expediente::orderBy('id_expediente', 'desc')->first();
    
        // Incrementa el número de expediente
        if ($lastExpediente) {
            // Extrae el número secuencial del último expediente
            $lastNumber = intval(substr($lastExpediente->numero, 0, 4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            // Si no hay expedientes, empieza con el número 0001
            $newNumber = '0001';
        }
    
        // Genera el nuevo número de expediente con el año actual y sufijo
        $currentYear = date('Y');
        return "{$newNumber}-{$currentYear}-OEC";
    }
    
    

    public function edit($id)
    {
        $expediente = Expediente::findOrFail($id);
        $personas = Persona::all();
        $procedencias = Procedencia::all();
        $infracciones = Infraccion::all();

        return view('expedientes.edit', compact('expediente', 'personas', 'procedencias', 'infracciones'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_persona' => 'required|exists:personas,ID_persona',
            'direccion_predio' => 'required|string|max:255',
            'ID_procedencia' => 'required|exists:procedencias,ID_procedencia',
            'fecha_entrada' => 'required|date',
            'fecha_notificacion' => 'nullable|date',
            'ID_infraccion' => 'required|exists:infracciones,ID_infraccion',
            'estado' => 'required|string|in:REC,REEF,RC,RSEC',
            'medida_complementaria' => 'nullable|string|max:255',
        ]);

        $expediente = Expediente::findOrFail($id);
        $expediente->update($request->all());

        return redirect()->route('expedientes.index')->with('success', 'Expediente actualizado con éxito');
    }

    public function editEstado($id)
    {
        $expediente = Expediente::findOrFail($id);
        $comprobantes = $expediente->comprobantes; // Asegúrate de que la relación esté definida en el modelo Expediente

        return view('expedientes.edit_estado',[
            'expediente' => $expediente,
            'comprobantes' => $comprobantes
        ],
        compact('expediente'));
    }

    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string|in:REC,REEF,RC,RSEC',
            'fecha_notificacion' => 'required|date',
        ]);

        $expediente = Expediente::findOrFail($id);
        $expediente->estado = $request->estado;
        $expediente->fecha_notificacion = $request->fecha_notificacion;
        $expediente->save();

        return redirect()->route('expedientes.index')->with('success', 'Estado del expediente actualizado con éxito');
    }

    public function destroy($id)
    {
        $expediente = Expediente::findOrFail($id);
        $expediente->delete();

        return redirect()->route('expedientes.index')->with('success', 'Expediente eliminado con éxito');
    }

    public function mostrarReportes()
    {
        return view('expedientes.reposmen');
    }

    
    
    
}
