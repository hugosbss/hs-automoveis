@extends('layouts.template')

@section('title', 'Detalhes do Veículo - HS Automoveis')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-7">
        <div class="galeria-principal">
          <img id="imagemPrincipal" src="{{ $veiculo->fotos->first()->url ?? 'https://via.placeholder.com/800x600' }}" alt="{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}" style="width: 100%; height: 100%; object-fit: cover;">
          @if($veiculo->fotos->count() > 1)
            <button class="galeria-nav esquerda" onclick="mudarImagem(-1)">❮</button>
            <button class="galeria-nav direita" onclick="mudarImagem(1)">❯</button>
            <div class="galeria-contador">
              <span id="imagemAtual">1</span> / <span id="totalImagens">{{ $veiculo->fotos->count() }}</span>
            </div>
          @endif
        </div>

        @if($veiculo->fotos->count() > 1)
          <div class="galeria-thumbnails" id="thumbnails">
            @foreach($veiculo->fotos as $index => $foto)
              <div class="galeria-thumbnail {{ $index === 0 ? 'ativa' : '' }}" onclick="selecionarImagem({{ $index }})">
                <img src="{{ $foto->url }}" alt="Imagem {{ $index + 1 }}">
              </div>
            @endforeach
          </div>
        @endif
      </div>

      <div class="col-lg-5">
        <div>
          <h1 class="mt-2">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}  • {{ $veiculo->ano }}</h1>

          <div class="card mt-3">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-6">
                  <small class="text-muted">Cor</small>
                  <p class="fw-bold">{{ $veiculo->cor->nome }}</p>
                </div>
                <div class="col-6">
                  <small class="text-muted">Quilometragem</small>
                  <p class="fw-bold">{{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <small class="text-muted">Ano</small>
                  <p class="fw-bold">{{ $veiculo->ano }}</p>
                </div>
                <div class="col-6">
                  <small class="text-muted">Marca</small>
                  <p class="fw-bold">{{ $veiculo->marca->nome }}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="card mt-3">
            <div class="card-body">
              <h3 class="card-title">Preço</h3>
              <p class="display-5 text-primary fw-bold">R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</p>
            </div>
          </div>

          @if($veiculo->descricao)
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Descrição</h5>
                <p>{{ $veiculo->descricao }}</p>
              </div>
            </div>
          @endif
        </div>

        {{-- <div class="card mt-4">
          <div class="card-body">
            <h5 class="card-title">Interesse neste Veículo?</h5>
            <form onsubmit="enviarMensagem(event)">
              <div class="formulario-grupo">
                <label>Seu Nome</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="formulario-grupo">
                <label>Seu Email</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="formulario-grupo">
                <label>Telefone</label>
                <input type="tel" class="form-control" required>
              </div>
              <div class="formulario-grupo">
                <label>Mensagem</label>
                <textarea class="form-control" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primario btn-bloco">Enviar Mensagem</button>
            </form>
          </div>
        </div>
      </div> --}}
    </div>

    {{-- carrossel veiculos similares --}}
    @if ($similares->count())
    <div class="mt-3">
        <h3 class="mb-3">Veículos similares</h3>

        <div class="row">
            @foreach($similares as $item)
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm"
                         onclick="window.location.href='{{ route('veiculos.show', $item->id) }}'"
                         style="cursor:pointer">

                        <img src="{{ $item->fotos->first()->url ?? 'https://via.placeholder.com/300x200' }}"
                             class="card-img-top"
                             style="height:140px; object-fit:cover;">

                        <div class="card-body">
                            <h6 class="fw-bold">
                                {{ $item->marca->nome }} {{ $item->modelo->nome }}
                            </h6>
                            <small>{{ $item->ano }} - {{ number_format($item->valor, 2, ',', '.') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

  </div>
@endsection

@push('scripts')
<script>
  let imagemAtualIndex = 0;
  const fotos = @json($veiculo->fotos->pluck('url')->toArray());

  function selecionarImagem(index) {
    imagemAtualIndex = index;
    atualizarImagemPrincipal();
  }

  function mudarImagem(direcao) {
    imagemAtualIndex += direcao;
    if (imagemAtualIndex < 0) {
      imagemAtualIndex = fotos.length - 1;
    } else if (imagemAtualIndex >= fotos.length) {
      imagemAtualIndex = 0;
    }
    atualizarImagemPrincipal();
  }

  function atualizarImagemPrincipal() {
    document.getElementById('imagemPrincipal').src = fotos[imagemAtualIndex];
    document.getElementById('imagemAtual').textContent = imagemAtualIndex + 1;

    document.querySelectorAll('.galeria-thumbnail').forEach((thumb, index) => {
      if (index === imagemAtualIndex) {
        thumb.classList.add('ativa');
      } else {
        thumb.classList.remove('ativa');
      }
    });
  }

  function enviarMensagem(event) {
    event.preventDefault();
    alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
    event.target.reset();
  }
</script>
@endpush

