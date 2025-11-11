@extends('layouts.template')

@section('title', 'Listagem de Veículos - HS Automoveis')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-3">
        <div class="filtros-sidebar">
          <h3>Filtros <button class="btn btn-sm btn-outline-secondary" onclick="limparFiltros()">✕</button></h3>
          
          <form method="GET" action="{{ route('veiculos.index') }}" id="filtroForm">
            <div class="filtro-grupo">
              <label>Buscar</label>
              <input type="text" name="busca" id="filtroTexto" placeholder="Marca, modelo..." value="{{ request('busca') }}">
            </div>

            <div class="filtro-grupo">
              <label>Marca</label>
              <select name="marca_id" id="filtroMarca">
                <option value="">Todas</option>
                @foreach($marcas ?? [] as $marca)
                  <option value="{{ $marca->id }}" {{ request('marca_id') == $marca->id ? 'selected' : '' }}>{{ $marca->nome }}</option>
                @endforeach
              </select>
            </div>

            <div class="filtro-grupo">
              <label>Ano Mínimo</label>
              <input type="number" name="ano_min" id="filtroAnoMin" placeholder="2000" value="{{ request('ano_min') }}">
            </div>

            <div class="filtro-grupo">
              <label>Preço Máximo</label>
              <input type="number" name="preco_max" id="filtroPrecoMax" placeholder="200000" value="{{ request('preco_max') }}">
            </div>

            <button type="submit" class="btn-limpar">Aplicar Filtros</button>
          </form>
        </div>
      </div>

      <div class="col-lg-9">
        <div class="mb-4">
          <h2>Veículos Disponíveis</h2>
          <p class="text-muted">Encontre o carro perfeito para você</p>
        </div>

        @if($veiculos->isEmpty())
          <div class="alert alert-info" role="alert">
            Nenhum veículo encontrado com os filtros selecionados.
          </div>
        @else
          <div class="veiculo-grid">
            @foreach($veiculos as $veiculo)
              <div class="veiculo-card" onclick="window.location.href='{{ route('veiculos.show', $veiculo) }}'" style="cursor: pointer;">
                <img src="{{ $veiculo->fotos->first()->url ?? 'https://via.placeholder.com/300x200' }}" alt="{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}" class="veiculo-imagem">
                <div class="veiculo-conteudo">
                  <span class="status-badge status-disponivel">Disponível</span>
                  <h3 class="veiculo-titulo">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</h3>
                  <p class="veiculo-info">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }} • {{ $veiculo->ano }}</p>
                  
                  <div class="veiculo-detalhes">
                    <div class="detalhe">
                      <div class="detalhe-label">Cor</div>
                      <div class="detalhe-valor">{{ $veiculo->cor->nome }}</div>
                    </div>
                    <div class="detalhe">
                      <div class="detalhe-label">KM</div>
                      <div class="detalhe-valor">{{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</div>
                    </div>
                  </div>
                  
                  <div class="veiculo-preco">R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  function limparFiltros() {
    window.location.href = '{{ route('veiculos.index') }}';
  }
</script>
@endpush

