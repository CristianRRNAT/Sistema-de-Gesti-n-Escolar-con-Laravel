<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    public function index()
{
    $materias = Materia::all();
    return view('admin.materias.index', compact('materias'));
}

public function store(Request $request)
{
    $request->validate(['nombre' => 'required|unique:materias']);
    Materia::create($request->all());
    return redirect()->back()->with('mensaje', 'Materia registrada con éxito');
}
}
