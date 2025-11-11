<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Veículos - HS Automoveis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
  <header class="header">
    <nav class="navbar container">
      <div class="logo">
        <div class="logo-icon">HS</div>
        HS Automoveis
      </div>
      <ul class="nav-links ms-auto">
        <li><a href="/home">Home</a></li>
        <li><a href="/veiculos" class="ativo">Veículos</a></li>
        <li><a href="/admin" class="ativo">Admin</a></li>
      </ul>
    </nav>
  </header>

  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-3">
        <div class="filtros-sidebar">
          <h3>Filtros <button class="btn btn-sm btn-outline-secondary" onclick="limparFiltros()">✕</button></h3>
          
          <div class="filtro-grupo">
            <label>Buscar</label>
            <input type="text" id="filtroTexto" placeholder="Marca, modelo...">
          </div>

          <div class="filtro-grupo">
            <label>Marca</label>
            <select id="filtroMarca">
              <option value="">Todas</option>
              <option value="Toyota">Toyota</option>
              <option value="Honda">Honda</option>
              <option value="Volkswagen">Volkswagen</option>
              <option value="Hyundai">Hyundai</option>
              <option value="Fiat">Fiat</option>
              <option value="Chevrolet">Chevrolet</option>
              <option value="Renault">Renault</option>
              <option value="Peugeot">Peugeot</option>
            </select>
          </div>

          <div class="filtro-grupo">
            <label>Ano Mínimo</label>
            <input type="number" id="filtroAnoMin" placeholder="2000">
          </div>

          <div class="filtro-grupo">
            <label>Preço Máximo</label>
            <input type="number" id="filtroPrecoMax" placeholder="200000">
          </div>

          <button class="btn-limpar" onclick="aplicarFiltros()">Aplicar Filtros</button>
        </div>
      </div>

      <div class="col-lg-9">
        <div class="mb-4">
          <h2>Veículos Disponíveis</h2>
          <p class="text-muted">Encontre o carro perfeito para você</p>
        </div>

        <div id="mensagemVazio" class="alert alert-info d-none" role="alert">
          Nenhum veículo encontrado com os filtros selecionados.
        </div>

        <div class="veiculo-grid" id="veiculosGrid">
        </div>
      </div>
    </div>
  </div>

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
    function renderizarVeiculos(lista) {
      const container = document.getElementById('veiculosGrid');
      const mensagem = document.getElementById('mensagemVazio');

      if (lista.length === 0) {
        container.innerHTML = '';
        mensagem.classList.remove('d-none');
        return;
      }

      mensagem.classList.add('d-none');
      container.innerHTML = lista.map(v => `
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

    function aplicarFiltros() {
      const filtros = {
        busca: document.getElementById('filtroTexto').value,
        marca: document.getElementById('filtroMarca').value,
        anoMin: parseInt(document.getElementById('filtroAnoMin').value) || 0,
        precoMax: parseInt(document.getElementById('filtroPrecoMax').value) || 999999
      };

      const resultado = filtrarVeiculos(filtros);
      renderizarVeiculos(resultado);
    }

    function limparFiltros() {
      document.getElementById('filtroTexto').value = '';
      document.getElementById('filtroMarca').value = '';
      document.getElementById('filtroAnoMin').value = '';
      document.getElementById('filtroPrecoMax').value = '';
      renderizarVeiculos(obterTodosVeiculos());
    }

    function irParaDetalhes(id) {
      window.location.href = `detalhe?id=${id}`;
    }

    document.getElementById('filtroTexto').addEventListener('keyup', aplicarFiltros);
    document.getElementById('filtroMarca').addEventListener('change', aplicarFiltros);
    document.getElementById('filtroAnoMin').addEventListener('change', aplicarFiltros);
    document.getElementById('filtroPrecoMax').addEventListener('change', aplicarFiltros);

    const params = new URLSearchParams(window.location.search);
    const busca = params.get('busca');
    if (busca) {
      document.getElementById('filtroTexto').value = busca;
    }

    aplicarFiltros();
  </script>
</body>
</html>
