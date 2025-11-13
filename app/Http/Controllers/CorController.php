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

    public function edit(Cor $cor)
    {
        return view('template-wmotors.pages.cor-form', compact('cor'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:25|unique:cores,nome',
        ]);

        $cor = Cor::create($validated);
        return redirect()->route('admin.veiculos')->with('success', 'Cor criada com sucesso!');
    }

    public function update(Request $request, Cor $cor)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:25|unique:cores,nome,' . $cor->id,
        ]);

        $cor->update($validated);
        return redirect()->route('admin.veiculos')->with('success', 'Cor atualizada com sucesso!');
    }

    public function destroy(Cor $cor)
    {
        $cor->delete();
        return redirect()->route('admin.veiculos')->with('success', 'Deletado com sucesso!');
    }
}
