@extends('layouts.template')

@section('title', isset($veiculo) ? 'Editar Veículo - HS Automoveis' : 'Adicionar Veículo - HS Automoveis')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-body p-5">
          <h2 class="card-title mb-4">{{ isset($veiculo) ? 'Editar Veículo' : 'Adicionar Novo Veículo' }}</h2>
          
          <form action="{{ isset($veiculo) ? route('admin.veiculos.update', $veiculo) : route('admin.veiculos.store') }}" method="POST">
            @csrf
            @if(isset($veiculo))
              @method('PUT')
            @endif

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="marca_id" class="form-label">Marca *</label>
                  <select name="marca_id" id="marca_id" class="form-select @error('marca_id') is-invalid @enderror" required>
                    <option value="">Selecione a marca</option>
                    @foreach($marcas as $marca)
                      <option value="{{ $marca->id }}" {{ isset($veiculo) && $veiculo->marca_id === $marca->id ? 'selected' : '' }}>{{ $marca->nome }}</option>
                    @endforeach
                  </select>
                  @error('marca_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="modelo_id" class="form-label">Modelo *</label>
                  <select name="modelo_id" id="modelo_id" class="form-select @error('modelo_id') is-invalid @enderror" required>
                    <option value="">Selecione o modelo</option>
                    @if(isset($veiculo))
                      @foreach($modelos->where('marca_id', $veiculo->marca_id) as $modelo)
                        <option value="{{ $modelo->id }}" {{ $veiculo->modelo_id === $modelo->id ? 'selected' : '' }}>{{ $modelo->nome }}</option>
                      @endforeach
                    @endif
                  </select>
                  @error('modelo_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="cor_id" class="form-label">Cor *</label>
                  <select name="cor_id" id="cor_id" class="form-select @error('cor_id') is-invalid @enderror" required>
                    <option value="">Selecione a cor</option>
                    @foreach($cores as $cor)
                      <option value="{{ $cor->id }}" {{ isset($veiculo) && $veiculo->cor_id === $cor->id ? 'selected' : '' }}>{{ $cor->nome }}</option>
                    @endforeach
                  </select>
                  @error('cor_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="ano" class="form-label">Ano *</label>
                  <input type="number" name="ano" id="ano" class="form-control @error('ano') is-invalid @enderror" min="1900" max="{{ date('Y') + 1 }}" value="{{ isset($veiculo) ? $veiculo->ano : old('ano') }}" required>
                  @error('ano')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="quilometragem" class="form-label">Quilometragem *</label>
                  <input type="number" name="quilometragem" id="quilometragem" class="form-control @error('quilometragem') is-invalid @enderror" min="0" value="{{ isset($veiculo) ? $veiculo->quilometragem : old('quilometragem') }}" required>
                  @error('quilometragem')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="valor" class="form-label">Valor (R$) *</label>
                  <input type="number" name="valor" id="valor" class="form-control @error('valor') is-invalid @enderror" step="0.01" min="0" value="{{ isset($veiculo) ? $veiculo->valor : old('valor') }}" required>
                  @error('valor')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="descricao" class="form-label">Descrição</label>
              <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" rows="3">{{ isset($veiculo) ? $veiculo->descricao : old('descricao') }}</textarea>
              @error('descricao')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              @if(isset($veiculo))
                @foreach($veiculo->fotos as $index => $foto)
                  <div class="input-group mb-2">
                    <input type="url" name="fotos[]" class="form-control @error('fotos.*') is-invalid @enderror" value="{{ $foto->url }}" required>
                    <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()">Remover</button>
                  </div>
                @endforeach
              @else
                <div class="input-group mb-2">
                  <input type="url" name="fotos[]" class="form-control @error('fotos.*') is-invalid @enderror" placeholder="URL da Foto 1" required>
                </div>
                <div class="input-group mb-2">
                  <input type="url" name="fotos[]" class="form-control @error('fotos.*') is-invalid @enderror" placeholder="URL da Foto 2" required>
                </div>
                <div class="input-group mb-2">
                  <input type="url" name="fotos[]" class="form-control @error('fotos.*') is-invalid @enderror" placeholder="URL da Foto 3" required>
                </div>
              @endif
              @error('fotos')
                <span class="invalid-feedback d-block">{{ $message }}</span>
              @enderror
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary">{{ isset($veiculo) ? 'Atualizar Veículo' : 'Adicionar Veículo' }}</button>
              <a href="{{ route('admin.veiculos') }}" class="btn btn-secondary">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@if(isset($modelos))
<script>
  const modelos = @json($modelos->groupBy('marca_id'));

  const marcaSelect = document.getElementById('marca_id');
  if (marcaSelect) {
    marcaSelect.addEventListener('change', function() {
      const marcaId = this.value;
      const modeloSelect = document.getElementById('modelo_id');
      modeloSelect.innerHTML = '<option value="">Selecione o modelo</option>';
      
      if (marcaId && modelos[marcaId]) {
        modelos[marcaId].forEach(modelo => {
          const option = document.createElement('option');
          option.value = modelo.id;
          option.textContent = modelo.nome;
          modeloSelect.appendChild(option);
        });
      }
    });
  }
</script>
@endif
@endsection
