<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;

class DependenciaController extends Controller
{
    // GET /api/dependencias
    public function index()
    {
        $deps = Dependencia::where('Activa', 1)->get();
        return response()->json($deps);
    }

    // GET /api/dependencias/{id}
    public function show($id)
    {
        $dep = Dependencia::findOrFail($id);
        return response()->json($dep);
    }
}
