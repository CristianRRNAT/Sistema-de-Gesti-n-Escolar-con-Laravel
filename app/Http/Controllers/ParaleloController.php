<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paralelo; // Verifica que esté así
use App\Models\Grado;

class ParaleloController extends Controller
{
    // Listar los paralelos
    public function index()
    {
    $paralelos = Paralelo::all();
    $grados = Grado::all(); // Asegúrate de tener esta línea
    return view('admin.paralelos.index', compact('paralelos', 'grados'));
}

    // Mostrar formulario de creación (aunque en el paso 5 lo pusimos todo en el index)
    public function create()
    {
        return view('admin.paralelos.create');
    }

    // Guardar el paralelo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:paralelos,nombre|max:50',
        ]);

        Paralelo::create([
            'nombre' => $request->nombre,
            'estado' => true
        ]);

        return redirect()->route('admin.paralelos.index')->with('success', 'Paralelo creado con éxito');
    }

    // Formulario para editar
    public function edit($id)
    {
        $paralelo = Paralelo::findOrFail($id);
        return view('admin.paralelos.edit', compact('paralelo'));
    }

    // Actualizar los datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:paralelos,nombre,'.$id,
        ]);

        $paralelo = Paralelo::findOrFail($id);
        $paralelo->update($request->all());

        return redirect()->route('admin.paralelos.index')->with('success', 'Paralelo actualizado');
    }

    // Eliminar
    public function destroy($id)
    {
        $paralelo = Paralelo::findOrFail($id);
        $paralelo->delete();

        return redirect()->route('admin.paralelos.index')->with('success', 'Paralelo eliminado');
    }
}