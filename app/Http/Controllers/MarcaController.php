<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::orderBy('nome')->get();
        return response()->json($marcas);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:50|unique:marcas,nome',
        ]);

        $marca = Marca::create($validated);
        return response()->json($marca, 201);
    }

    public function update(Request $request, Marca $marca)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:50|unique:marcas,nome,' . $marca->id,
        ]);

        $marca->update($validated);
        return response()->json($marca);
    }

    public function destroy(Marca $marca)
    {
        $marca->delete();
        return response()->json(['message' => 'Marca deletada com sucesso']);
    }
}
