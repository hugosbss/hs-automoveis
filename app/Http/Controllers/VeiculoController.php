<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::with('fotos')->get();
        return view('template-wmotors.pages.veiculoLista', compact('veiculos'));
    }

    public function show(Veiculo $veiculo)
    {
        return view('template-wmotors.pages.veiculoDetalhe', compact('veiculo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'cor' => 'required|string|max:25',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
        ]);

        $veiculo = Veiculo::create($validated);
        return redirect()->route('wmotors.admin');
    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect()->route('wmotors.admin');
    }

    public function update(Request $request, Veiculo $veiculo)
    {
        $validated = $request->validate([
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'cor' => 'required|string|max:25',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
        ]);

        $veiculo->update($validated);
        return redirect()->route('wmotors.admin');
    }
}