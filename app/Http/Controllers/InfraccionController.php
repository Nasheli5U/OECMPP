<?php

namespace App\Http\Controllers;

use App\Models\Infraccion;
use Illuminate\Http\Request;

class InfraccionController extends Controller
{
    public function index()
    {
        $infracciones = Infraccion::all();
        return view('infracciones.index', compact('infracciones'));
    }

    public function create()
    {
        return view('infracciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:infracciones,codigo|max:255',
            'descripcion' => 'required|string|max:500',
            'monto' => 'required|numeric',
        ]);

        Infraccion::create($request->all());

        return redirect()->route('infracciones.index')->with('success', 'Infracción creada con éxito.');
    }

    public function show(Infraccion $infraccion)
    {
        return view('infracciones.show', compact('infraccion'));
    }

    public function edit(Infraccion $infraccion)
    {
        return view('infracciones.edit', compact('infraccion'));
    }

    public function update(Request $request, Infraccion $infraccion)
    {
        $request->validate([
            'codigo' => 'required|string|unique:infracciones,codigo,' . $infraccion->id . '|max:255',
            'descripcion' => 'required|string|max:500',
            'monto' => 'required|numeric',
        ]);

        $infraccion->update($request->all());

        return redirect()->route('infracciones.index')->with('success', 'Infracción actualizada con éxito.');
    }

    public function destroy(Infraccion $infraccion)
    {
        $infraccion->delete();
        return redirect()->route('infracciones.index')->with('success', 'Infracción eliminada con éxito.');
    }
}
