<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    public function index()
    {
        $cores = Cor::orderBy('nome')->get();
        return response()->json($cores);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:25|unique:cores,nome',
        ]);

        $cor = Cor::create($validated);
        return response()->json($cor, 201);
    }

    public function update(Request $request, Cor $cor)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:25|unique:cores,nome,' . $cor->id,
        ]);

        $cor->update($validated);
        return response()->json($cor);
    }

    public function destroy(Cor $cor)
    {
        $cor->delete();
        return response()->json(['message' => 'Cor deletada com sucesso']);
    }
}
