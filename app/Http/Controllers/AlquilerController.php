<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alquiler;

class AlquilerController extends Controller
{
    public function index()
    {
        $alquileres = Alquiler::with('alquileres')->get();
        return view('alquileres.index', compact('alquileres'));
    }
 
    public function create()
    {
        return view('alquileres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|string|max:255',
            'inicio' => 'required|email|unique:alquileres',
            'fin' => 'required|email|unique:alquileres',
        ]);

        $alquiler = Alquiler::create([
            'monto' => $request->input('monto'),
            'inicio' => $request->input('inicio'),
            'fin' => $request->input('fin'),
            'pais_id' => $request->input('pais_id'),
        ]);

        return redirect()->route('alquileres.index')->with('success', 'Alquiler creado exitosamente');
    }

    public function show($id)
    {
        $usuario = ALquiler::findOrFail($id);
        return view('alquileres.show', compact('alquiler'));
    }

    public function edit($id)
    {
        $usuario = Alquiler::findOrFail($id);
        $paises = Pais::all();
        return view('alquileres.edit', compact('alquiler'));
    }

    public function update(Request $request, $id)
    {
        $usuario = ALquiler::findOrFail($id);
        $usuario->update($request->all());
        $usuario->perfil()->update($request->only('bio'));
        return redirect()->route('alquileres.index')->with('success', 'Alquiler actualizado exitosamente');
    }

    public function destroy($id)
    {
        $usuario = Alquiler::findOrFail($id);
        $usuario->perfil()->delete();
        $usuario->delete();
        return redirect()->route('alquileres.index')->with('success', 'Alquiler eliminado exitosamente');
    }
}
