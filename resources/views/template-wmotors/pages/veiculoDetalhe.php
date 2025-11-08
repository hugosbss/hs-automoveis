<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes do Veículo - HS Automoveis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
  <!-- HEADER -->
  <header class="header">
    <nav class="navbar container">
      <div class="logo">
        <div class="logo-icon">HS</div>
        HS Automoveis
      </div>
      <ul class="nav-links ms-auto">
        <li><a href="/home">Home</a></li>
        <li><a href="/veiculos">Veículos</a></li>
        <li><a href="/admin" class="ativo">Admin</a></li>
      </ul>
    </nav>
  </header>

  <!-- CONTEÚDO -->
  <div class="container mt-4" id="conteudo">
    <div class="row">
      <!-- GALERIA -->
      <div class="col-lg-7">
        <div class="galeria-principal">
          <img id="imagemPrincipal" src="" alt="Veículo" style="width: 100%; height: 100%; object-fit: cover;">
          <button class="galeria-nav esquerda" onclick="mudarImagem(-1)">❮</button>
          <button class="galeria-nav direita" onclick="mudarImagem(1)">❯</button>
          <div class="galeria-contador">
            <span id="imagemAtual">1</span> / <span id="totalImagens">3</span>
          </div>
        </div>

        <div class="galeria-thumbnails" id="thumbnails">
          <!-- Preenchido por JavaScript -->
        </div>
      </div>

      <!-- INFORMAÇÕES -->
      <div class="col-lg-5">
        <div id="infoVeiculo">
          <!-- Preenchido por JavaScript -->
        </div>

        <!-- FORMULÁRIO DE CONTATO -->
        <div class="card mt-4">
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
      </div>
    </div>

    <!-- VEÍCULOS RELACIONADOS -->
    <div class="mt-5">
      <h3>Veículos Similares</h3>
      <div class="veiculo-grid" id="veiculosSimilares">
        <!-- Preenchido por JavaScript -->
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="footer mt-5">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-coluna">
          <h3>Sobre</h3>
          <ul>
            <li><a href="#">Quem Somos</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contato</a></li>
          </ul>
        </div>
        <div class="footer-coluna">
          <h3>Comprador</h3>
          <ul>
            <li><a href="#">Como Comprar</a></li>
            <li><a href="#">Financiamento</a></li>
            <li><a href="#">Seguro</a></li>
          </ul>
        </div>
        <div class="footer-coluna">
          <h3>Vendedor</h3>
          <ul>
            <li><a href="#">Vender Carro</a></li>
            <li><a href="#">Minhas Vendas</a></li>
            <li><a href="#">Dúvidas</a></li>
          </ul>
        </div>
        <div class="footer-coluna">
          <h3>Legal</h3>
          <ul>
            <li><a href="#">Termos de Uso</a></li>
            <li><a href="#">Privacidade</a></li>
            <li><a href="#">Cookies</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 HS Automoveis. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/dados.js"></script>
  <script>
    let veiculoAtual = null;
    let imagemAtualIndex = 0;

    function carregarVeiculo() {
      const params = new URLSearchParams(window.location.search);
      const id = params.get('id');

      if (!id) {
        document.getElementById('conteudo').innerHTML = '<div class="alert alert-danger">Veículo não encontrado</div>';
        return;
      }

      veiculoAtual = obterVeiculo(id);

      if (!veiculoAtual) {
        document.getElementById('conteudo').innerHTML = '<div class="alert alert-danger">Veículo não encontrado</div>';
        return;
      }

      renderizarDetalhes();
      renderizarThumbnails();
      renderizarSimilares();
    }

    function renderizarDetalhes() {
      const container = document.getElementById('infoVeiculo');
      container.innerHTML = `
        <span class="status-badge status-${veiculoAtual.status}">${veiculoAtual.status === 'disponivel' ? 'Disponível' : 'Vendido'}</span>
        <h1 class="mt-2">${veiculoAtual.titulo}</h1>
        <p class="text-muted">${veiculoAtual.marca} ${veiculoAtual.modelo} • ${veiculoAtual.ano}</p>

        <div class="card mt-3">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-6">
                <small class="text-muted">Cor</small>
                <p class="fw-bold">${veiculoAtual.cor}</p>
              </div>
              <div class="col-6">
                <small class="text-muted">Quilometragem</small>
                <p class="fw-bold">${formatarQuilometragem(veiculoAtual.quilometragem)} km</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <small class="text-muted">Ano</small>
                <p class="fw-bold">${veiculoAtual.ano}</p>
              </div>
              <div class="col-6">
                <small class="text-muted">Visualizações</small>
                <p class="fw-bold">👁️ ${veiculoAtual.visualizacoes}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <h3 class="card-title">Preço</h3>
            <p class="display-5 text-primary fw-bold">${formatarPreco(veiculoAtual.preco)}</p>
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <h5 class="card-title">Descrição</h5>
            <p>${veiculoAtual.descricao}</p>
          </div>
        </div>
      `;
    }

    function renderizarThumbnails() {
      const container = document.getElementById('thumbnails');
      document.getElementById('totalImagens').textContent = veiculoAtual.imagens.length;

      container.innerHTML = veiculoAtual.imagens.map((img, index) => `
        <div class="galeria-thumbnail ${index === 0 ? 'ativa' : ''}" onclick="selecionarImagem(${index})">
          <img src="${img}" alt="Imagem ${index + 1}">
        </div>
      `).join('');

      atualizarImagemPrincipal();
    }

    function selecionarImagem(index) {
      imagemAtualIndex = index;
      atualizarImagemPrincipal();
    }

    function mudarImagem(direcao) {
      imagemAtualIndex += direcao;
      if (imagemAtualIndex < 0) {
        imagemAtualIndex = veiculoAtual.imagens.length - 1;
      } else if (imagemAtualIndex >= veiculoAtual.imagens.length) {
        imagemAtualIndex = 0;
      }
      atualizarImagemPrincipal();
    }

    function atualizarImagemPrincipal() {
      document.getElementById('imagemPrincipal').src = veiculoAtual.imagens[imagemAtualIndex];
      document.getElementById('imagemAtual').textContent = imagemAtualIndex + 1;

      // Atualizar thumbnails
      document.querySelectorAll('.galeria-thumbnail').forEach((thumb, index) => {
        if (index === imagemAtualIndex) {
          thumb.classList.add('ativa');
        } else {
          thumb.classList.remove('ativa');
        }
      });
    }

    function renderizarSimilares() {
      const similares = obterTodosVeiculos()
        .filter(v => v.marca === veiculoAtual.marca && v.id !== veiculoAtual.id)
        .slice(0, 3);

      const container = document.getElementById('veiculosSimilares');
      if (similares.length === 0) {
        container.innerHTML = '<p class="text-muted">Nenhum veículo similar encontrado</p>';
        return;
      }

      container.innerHTML = similares.map(v => `
        <div class="veiculo-card" onclick="irParaDetalhes(${v.id})">
          <img src="${v.imagemPrincipal}" alt="${v.titulo}" class="veiculo-imagem">
          <div class="veiculo-conteudo">
            <span class="status-badge status-${v.status}">${v.status === 'disponivel' ? 'Disponível' : 'Vendido'}</span>
            <h3 class="veiculo-titulo">${v.titulo}</h3>
            <p class="veiculo-info">${v.marca} ${v.modelo} • ${v.ano}</p>
            
            <div class="veiculo-detalhes">
              <div class="detalhe">
                <div class="detalhe-label">Cor</div>
                <div class="detalhe-valor">${v.cor}</div>
              </div>
              <div class="detalhe">
                <div class="detalhe-label">KM</div>
                <div class="detalhe-valor">${formatarQuilometragem(v.quilometragem)}</div>
              </div>
            </div>
            
            <div class="veiculo-preco">${formatarPreco(v.preco)}</div>
            <p class="veiculo-visualizacoes">👁️ ${v.visualizacoes} visualizações</p>
          </div>
        </div>
      `).join('');
    }

    function irParaDetalhes(id) {
      window.location.href = `detalhe?id=${id}`;
    }

    function enviarMensagem(event) {
      event.preventDefault();
      alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
      event.target.reset();
    }

    // Carregar ao abrir
    carregarVeiculo();
  </script>
</body>
</html>
