<?php

namespace App\Http\Controllers;

use App\Models\Procedencia;
use Illuminate\Http\Request;

class ProcedenciaController extends Controller
{
    public function index()
    {
        $procedencias = Procedencia::all();
        return view('procedencias.index', compact('procedencias'));
    }

    public function create()
    {
        return view('procedencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:procedencias,nombre|max:255',
        ]);

        Procedencia::create($request->all());

        return redirect()->route('procedencias.index')->with('success', 'Procedencia creada con éxito.');
    }

    public function show(Procedencia $procedencia)
    {
        return view('procedencias.show', compact('procedencia'));
    }

    public function edit(Procedencia $procedencia)
    {
        return view('procedencias.edit', compact('procedencia'));
    }

    public function update(Request $request, Procedencia $procedencia)
    {
        $request->validate([
            'nombre' => 'required|string|unique:procedencias,nombre,' . $procedencia->id . '|max:255',
        ]);

        $procedencia->update($request->all());

        return redirect()->route('procedencias.index')->with('success', 'Procedencia actualizada con éxito.');
    }

    public function destroy(Procedencia $procedencia)
    {
        $procedencia->delete();
        return redirect()->route('procedencias.index')->with('success', 'Procedencia eliminada con éxito.');
    }
}
