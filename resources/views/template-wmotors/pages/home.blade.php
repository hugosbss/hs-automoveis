@extends('layouts.template')

@section('title', 'HS Automoveis - Encontre seu Carro Perfeito')

@section('content')
  <section class="hero">
    <div class="container">
      <h1>Encontre seu Carro Perfeito</h1>
      <p>Milhares de veículos disponíveis para você escolher</p>
      
      <div class="busca-container">
        <input type="text" id="buscaHome" placeholder="Buscar marca, modelo ou título..." class="form-control">
        <button onclick="buscarVeiculos()" class="btn btn-danger">Buscar</button>
      </div>
    </div>
  </section>
  <section class="container mt-5">
    <div class="recursos">
      <div class="recurso-card">
        <div class="recurso-icon azul">📊</div>
        <h3>Melhor Preço</h3>
        <p>Encontre os melhores preços do mercado</p>
      </div>
      <div class="recurso-card">
        <div class="recurso-icon verde">🔒</div>
        <h3>Segurança</h3>
        <p>Transações seguras e confiáveis</p>
      </div>
      <div class="recurso-card">
        <div class="recurso-icon roxo">⚡</div>
        <h3>Rápido</h3>
        <p>Processo rápido e fácil</p>
      </div>
    </div>
  </section>

  <section class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2>Veículos em Destaque</h2>
        <p class="text-muted">Os veículos mais visualizados do momento</p>
      </div>
    </div>

    <div class="veiculo-grid" id="veiculosDestaque">
      @forelse($veiculos->take(6) as $veiculo)
        <div class="veiculo-card" onclick="window.location.href='{{ route('veiculos.show', $veiculo) }}'">
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
      @empty
        <p class="text-muted">Nenhum veículo disponível no momento.</p>
      @endforelse
    </div>

    <div class="text-center mt-4">
      <a href="{{ route('veiculos.index') }}" class="btn btn-primario btn-grande">Ver Todos os Veículos</a>
    </div>
  </section>

  <section class="container mt-5">
    <div class="cta-section">
      <h2>Quer Vender seu Carro?</h2>
      <p>Anuncie seu veículo gratuitamente e alcance milhares de compradores</p>
      @auth
        <a href="{{ route('admin.veiculos') }}" class="btn btn-light btn-grande">Anunciar Agora</a>
      @else
        <a href="{{ route('login') }}" class="btn btn-light btn-grande">Anunciar Agora</a>
      @endauth
    </div>
  </section>
@endsection

@push('scripts')
<script>
  function buscarVeiculos() {
    const busca = document.getElementById('buscaHome').value;
    if (busca.trim()) {
      window.location.href = '{{ route('veiculos.index') }}?busca=' + encodeURIComponent(busca);
    }
  }

  document.getElementById('buscaHome').addEventListener('keypress', (e) => {
    if (e.key === 'Enter') buscarVeiculos();
  });
</script>
@endpush

