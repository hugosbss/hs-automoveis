<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FotoVeiculoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'foto' => 'required|image|max:2048',
        ]);

        $fotoVeiculo = new \App\Models\FotoVeiculo();
        $fotoVeiculo->veiculo_id = $request->veiculo_id;
    }

    public function edit (Request $request)
    {
        $request->validate([
            'foto_id' => 'required|exists:foto_veiculos,id',
            'foto' => 'required|image|max:2048',
        ]);
        $fotoVeiculo = \App\Models\FotoVeiculo::findOrFail($request->foto_id);
        
        $fotoVeiculo->url = $request->url;
        $fotoVeiculo->save();
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'foto_id' => 'required|exists:foto_veiculos,id',
        ]);
        $fotoVeiculo = \App\Models\FotoVeiculo::findOrFail($request->foto_id);
        $fotoVeiculo->delete();
    }
}