<?php

namespace App\Http\Controllers;

use App\Models\DetallePago;
use App\Models\Comprobante;
use App\Models\Pago;
use Illuminate\Http\Request;

class DetallePagoController extends Controller
{
    public function index()
    {
        $detalles = DetallePago::with('comprobante', 'pago')->get();
        return view('detalles.index', compact('detalles'));
    }

    public function create()
    {
        $comprobantes = Comprobante::all();
        $pagos = Pago::all();
        return view('detalles.create', compact('comprobantes', 'pagos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_comprobante' => 'required|exists:comprobantes,id',
            'ID_pago' => 'required|exists:pagos,id',
            'monto' => 'required|numeric',
        ]);

        DetallePago::create($request->all());

        return redirect()->route('detalles.index')->with('success', 'Detalle de Pago creado con éxito.');
    }

    public function show(DetallePago $detallePago)
    {
        return view('detalles.show', compact('detallePago'));
    }

    public function edit(DetallePago $detallePago)
    {
        $comprobantes = Comprobante::all();
        $pagos = Pago::all();
        return view('detalles.edit', compact('detallePago', 'comprobantes', 'pagos'));
    }

    public function update(Request $request, DetallePago $detallePago)
    {
        $request->validate([
            'ID_comprobante' => 'required|exists:comprobantes,id',
            'ID_pago' => 'required|exists:pagos,id',
            'monto' => 'required|numeric',
        ]);

        $detallePago->update($request->all());

        return redirect()->route('detalles.index')->with('success', 'Detalle de Pago actualizado con éxito.');
    }

    public function destroy(DetallePago $detallePago)
    {
        $detallePago->delete();
        return redirect()->route('detalles.index')->with('success', 'Detalle de Pago eliminado con éxito.');
    }
}
