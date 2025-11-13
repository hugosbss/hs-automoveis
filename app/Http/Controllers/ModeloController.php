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

    public function edit(Modelo $modelo)
    {
        $marcas = Marca::orderBy('nome')->get();
        $modelo->load('marca');
        return view('template-wmotors.pages.modelo-form', compact('modelo', 'marcas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:50',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        $modelo = Modelo::create($validated);
        return redirect()->route('admin.veiculos')->with('success', 'Modelo cadastrado com sucesso!');
    }

    public function update(Request $request, Modelo $modelo)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:50',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        $modelo->update($validated);
        return redirect()->route('admin.veiculos')->with('success', 'Modelo atualizado com sucesso!');
    }

    public function destroy(Modelo $modelo)
    {
        $modelo->delete();
        return response()->json(['message' => 'Modelo deletado com sucesso']);
    }
}
