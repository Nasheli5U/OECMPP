<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Expediente;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function index()
    {
        $archivos = Archivo::with('expediente')->get();
        return view('archivos.index', compact('archivos'));
    }

    public function create()
    {
        $expedientes = Expediente::all();
        return view('archivos.create', compact('expedientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_expediente' => 'required|exists:expedientes,id',
            'archivos_REC' => 'nullable|string|max:255',
            'archivos_REEF' => 'nullable|string|max:255',
            'archivos_RC' => 'nullable|string|max:255',
            'archivos_RSEC' => 'nullable|string|max:255',
            'archivos_otros' => 'nullable|string|max:255',
        ]);

        Archivo::create($request->all());

        return redirect()->route('archivos.index')->with('success', 'Archivo creado con éxito.');
    }

    public function show(Archivo $archivo)
    {
        return view('archivos.show', compact('archivo'));
    }

    public function edit(Archivo $archivo)
    {
        $expedientes = Expediente::all();
        return view('archivos.edit', compact('archivo', 'expedientes'));
    }

    public function update(Request $request, Archivo $archivo)
    {
        $request->validate([
            'ID_expediente' => 'required|exists:expedientes,id',
            'archivos_REC' => 'nullable|string|max:255',
            'archivos_REEF' => 'nullable|string|max:255',
            'archivos_RC' => 'nullable|string|max:255',
            'archivos_RSEC' => 'nullable|string|max:255',
            'archivos_otros' => 'nullable|string|max:255',
        ]);

        $archivo->update($request->all());

        return redirect()->route('archivos.index')->with('success', 'Archivo actualizado con éxito.');
    }

    public function destroy(Archivo $archivo)
    {
        $archivo->delete();
        return redirect()->route('archivos.index')->with('success', 'Archivo eliminado con éxito.');
    }
}
