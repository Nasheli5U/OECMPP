<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use App\Models\Expediente;
use App\Models\DetallePago;
use App\Models\Pago;
use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    public function index($ID_expediente)
    {
        $expediente = Expediente::findOrFail($ID_expediente);
        $comprobantes = Comprobante::where('ID_expediente', $ID_expediente)->get();

        return view('comprobantes.index', compact('expediente', 'comprobantes'));
    }

    public function create($id_expediente)
    {
        $expediente = Expediente::findOrFail($id_expediente);

        // Obtener todos los pagos disponibles
        $pagos = Pago::all();

        return view('comprobantes.create', [
            'expediente' => $expediente,
            'pagos' => $pagos,
        ]);
    }

    public function store(Request $request)
    {
        // Validar y almacenar el comprobante
        $request->validate([
            'numero_recibo' => 'required|unique:comprobantes',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
            'pagos' => 'required|array',
            'pagos.*' => 'exists:pagos,ID_pago',
        ]);

        $comprobante = new Comprobante();
        $comprobante->ID_expediente = $request->input('ID_expediente');
        $comprobante->numero_recibo = $request->input('numero_recibo');
        $comprobante->fecha = $request->input('fecha');
        $comprobante->total = $request->input('total');
        $comprobante->save();

        foreach ($request->input('pagos') as $pagoId) {
            $pago = Pago::findOrFail($pagoId);
            $comprobante->detallePagos()->create([
                'ID_pago' => $pago->ID_pago,
                'monto' => $pago->monto,
            ]);
        }

        return redirect()->route('expedientes.edit_estado', $comprobante->ID_expediente)
                         ->with('success', 'Comprobante creado exitosamente.');
    }
    


    public function show(Comprobante $comprobante)
    {
        return view('comprobantes.show', compact('comprobante'));
    }

    public function edit(Comprobante $comprobante)
    {
        $expedientes = Expediente::all();
        return view('comprobantes.edit', compact('comprobante', 'expedientes'));
    }

    public function update(Request $request, Comprobante $comprobante)
    {
        $request->validate([
            'ID_expediente' => 'required|exists:expedientes,id',
            'numero_recibo' => 'required|string|unique:comprobantes,numero_recibo,' . $comprobante->id . '|max:255',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $comprobante->update($request->all());

        return redirect()->route('comprobantes.index')->with('success', 'Comprobante actualizado con éxito.');
    }

    public function destroy(Comprobante $comprobante)
    {
        $comprobante->delete();
        return redirect()->route('comprobantes.index')->with('success', 'Comprobante eliminado con éxito.');
    }
}
