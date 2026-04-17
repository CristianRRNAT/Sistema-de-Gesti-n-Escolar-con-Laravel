<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class RoleController extends Controller

{
    public function index()
    {
        // Traemos todos los roles de la base de datos
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validamos que el nombre sea obligatorio y único
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        // Creamos el rol usando el modelo de Spatie
        Role::create(['name' => $request->name]);

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Se registró el rol de manera correcta')
            ->with('icono', 'success');
    }
}

