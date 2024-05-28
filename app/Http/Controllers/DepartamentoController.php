<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Propietario;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::with('departamentos')->get();
        return view('departamentos.index', compact('departamentos'));
    }
 
    public function create()
    {
        $propietarios = Propietario::all();
        return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'renta' => 'required|email|unique:departamentos',
            'propietario_id' => 'required|email|unique:departamentos',
        ]);

        $alquiler = Departamento::create([
            'direccion' => $request->input('direccion'),
            'renta' => $request->input('renta'),
            'propietario_id' => $request->input('propietario_id'),
        ]);

        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente');
    }

    public function show($id)
    {
        $usuario = Departamento::findOrFail($id);
        return view('departamentos.show', compact('departamento'));
    }

    public function edit($id)
    {
        $usuario = Departamento::findOrFail($id);
        $propietarios = Propietario::all();
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Departamento::findOrFail($id);
        $usuario->update($request->all());
        $usuario->perfil()->update($request->only('bio'));
        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente');
    }

    public function destroy($id)
    {
        $usuario = Departamento::findOrFail($id);
        $usuario->perfil()->delete();
        $usuario->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente');
    }
}
