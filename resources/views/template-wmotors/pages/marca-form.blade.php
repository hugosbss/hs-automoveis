@extends('layouts.template')

@section('title', 'Editar Marca - HS Automoveis')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow">
        <div class="card-body p-5">
          <h2 class="card-title mb-4">Editar Marca</h2>
          
          <form action="{{ route('admin.marcas.update', $marca) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="nome" class="form-label">Nome da Marca *</label>
              <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ $marca->nome }}" required>
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
