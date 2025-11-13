<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\FotoVeiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cor;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index(Request $request)
    {
        $query = Veiculo::with(['marca', 'modelo', 'cor', 'fotos']);
        
        if ($request->has('busca') && $request->busca) {
            $busca = $request->busca;
            $query->whereHas('marca', function($q) use ($busca) {
                $q->where('nome', 'like', "%{$busca}%");
            })->orWhereHas('modelo', function($q) use ($busca) {
                $q->where('nome', 'like', "%{$busca}%");
            });
        }
        
        if ($request->has('marca_id') && $request->marca_id) {
            $query->where('marca_id', $request->marca_id);
        }
        
        if ($request->has('ano_min') && $request->ano_min) {
            $query->where('ano', '>=', $request->ano_min);
        }
        
        if ($request->has('preco_max') && $request->preco_max) {
            $query->where('valor', '<=', $request->preco_max);
        }
        
        $veiculos = $query->get();
        $marcas = \App\Models\Marca::orderBy('nome')->get();
        
        return view('template-wmotors.pages.veiculoLista', compact('veiculos', 'marcas'));
    }

    public function show(Veiculo $veiculo)
    {
        $veiculo->load(['marca', 'modelo', 'cor', 'fotos']);
        return view('template-wmotors.pages.veiculoDetalhe', compact('veiculo'));
    }

    public function adminIndex()
    {
        if (!auth()->check()) {
            return view('template-wmotors.pages.administrador', [
                'veiculos' => collect(),
                'marcas' => collect(),
                'modelos' => collect(),
                'cores' => collect(),
                'showLogin' => true
            ]);
        }
        
        $veiculos = Veiculo::with(['marca', 'modelo', 'cor', 'fotos'])->get();
        $marcas = Marca::orderBy('nome')->get();
        $modelos = Modelo::with('marca')->orderBy('nome')->get();
        $cores = Cor::orderBy('nome')->get();
        
        return view('template-wmotors.pages.administrador', compact('veiculos', 'marcas', 'modelos', 'cores'));
    }

    public function create()
    {
        $marcas = Marca::orderBy('nome')->get();
        $modelos = Modelo::with('marca')->orderBy('nome')->get();
        $cores = Cor::orderBy('nome')->get();
        
        return view('template-wmotors.pages.veiculo-form', compact('marcas', 'modelos', 'cores'));
    }

    public function edit(Veiculo $veiculo)
    {
        $veiculo->load(['marca', 'modelo', 'cor', 'fotos']);
        $marcas = Marca::orderBy('nome')->get();
        $modelos = Modelo::with('marca')->orderBy('nome')->get();
        $cores = Cor::orderBy('nome')->get();
        
        return view('template-wmotors.pages.veiculo-form', compact('veiculo', 'marcas', 'modelos', 'cores'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'cor_id' => 'required|exists:cores,id',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'fotos' => 'required|array|min:3',
            'fotos.*' => 'required|url',
        ]);

        $validated['usuario_id'] = auth()->id();
        $fotos = $validated['fotos'];
        unset($validated['fotos']);

        $veiculo = Veiculo::create($validated);

        foreach ($fotos as $url) {
            FotoVeiculo::create([
                'veiculo_id' => $veiculo->id,
                'url' => $url,
            ]);
        }

        return redirect()->route('admin.veiculos')->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function update(Request $request, Veiculo $veiculo)
    {
        $validated = $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'cor_id' => 'required|exists:cores,id',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'fotos' => 'nullable|array|min:3',
            'fotos.*' => 'required|url',
        ]);

        $fotos = $validated['fotos'] ?? null;
        unset($validated['fotos']);

        $veiculo->update($validated);

        if ($fotos) {
            $veiculo->fotos()->delete();
            foreach ($fotos as $url) {
                FotoVeiculo::create([
                    'veiculo_id' => $veiculo->id,
                    'url' => $url,
                ]);
            }
        }

        return redirect()->route('admin.veiculos')->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy(Veiculo $veiculo)
    {
        try {
        
        $veiculo->delete();
        return redirect()->route('admin.veiculos')->with('toast_success', 'Veículo deletado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.veiculos')->with('toast_error', 'Erro ao deletar veículo: $veiculo->id');
        }
    }
}
