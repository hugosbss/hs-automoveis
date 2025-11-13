@extends('layouts.template')

@section('title', 'Editar Modelo - HS Automoveis')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow">
        <div class="card-body p-5">
          <h2 class="card-title mb-4">Editar Modelo</h2>
          
          <form action="{{ route('admin.modelos.update', $modelo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="marca_id" class="form-label">Marca *</label>
              <select name="marca_id" id="marca_id" class="form-select @error('marca_id') is-invalid @enderror" required>
                <option value="">Selecione a marca</option>
                @foreach($marcas as $marca)
                  <option value="{{ $marca->id }}" {{ $modelo->marca_id === $marca->id ? 'selected' : '' }}>{{ $marca->nome }}</option>
                @endforeach
              </select>
              @error('marca_id')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="nome" class="form-label">Nome do Modelo *</label>
              <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ $modelo->nome }}" required>
              @error('nome')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary">Atualizar</button>
              <a href="{{ route('admin.veiculos') }}" class="btn btn-secondary">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
