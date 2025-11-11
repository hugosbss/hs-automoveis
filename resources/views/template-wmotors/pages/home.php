<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HS Automoveis - Encontre seu Carro Perfeito</title>
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
        <li><a href="/home" class="ativo">Home</a></li>
        <li><a href="/veiculos">Veículos</a></li>
        <li><a href="/admin" class="ativo">Admin</a></li>
      </ul>
    </nav>
  </header>

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
    </div>

    <div class="text-center mt-4">
      <a href="/veiculos" class="btn btn-primario btn-grande">Ver Todos os Veículos</a>
    </div>
  </section>

  <section class="container mt-5">
    <div class="cta-section">
      <h2>Quer Vender seu Carro?</h2>
      <p>Anuncie seu veículo gratuitamente e alcance milhares de compradores</p>
      <button class="btn btn-light btn-grande" onclick="alert('Funcionalidade em desenvolvimento')">Anunciar Agora</button>
    </div>
  </section>

  <footer class="footer">
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
    function carregarDestaque() {
      const destaque = obterTodosVeiculos()
        .sort((a, b) => b.visualizacoes - a.visualizacoes)
        .slice(0, 6);
      
      const container = document.getElementById('veiculosDestaque');
      container.innerHTML = destaque.map(v => `
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

    function buscarVeiculos() {
      const busca = document.getElementById('buscaHome').value;
      if (busca.trim()) {
        window.location.href = `veiculo?busca=${encodeURIComponent(busca)}`;
      }
    }

    function irParaDetalhes(id) {
      window.location.href = `Detalhe?id=${id}`;
    }

    document.getElementById('buscaHome').addEventListener('keypress', (e) => {
      if (e.key === 'Enter') buscarVeiculos();
    });

    carregarDestaque();
  </script>
</body>
</html>
