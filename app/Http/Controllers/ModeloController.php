<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index(Request $request)
    {
        $query = Modelo::with('marca');
        
        if ($request->has('marca_id')) {
            $query->where('marca_id', $request->marca_id);
        }
        
        $modelos = $query->orderBy('nome')->get();
        return response()->json($modelos);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:50',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        $modelo = Modelo::create($validated);
        return response()->json($modelo->load('marca'), 201);
    }

    public function update(Request $request, Modelo $modelo)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:50',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        $modelo->update($validated);
        return response()->json($modelo->load('marca'));
    }

    public function destroy(Modelo $modelo)
    {
        $modelo->delete();
        return response()->json(['message' => 'Modelo deletado com sucesso']);
    }
}
