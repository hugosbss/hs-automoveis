<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador - HS Automoveis</title>
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
  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1>Dashboard Administrativo</h1>
      <button class="btn btn-primario" onclick="abrirModalAdicionar()">+ Adicionar Veículo</button>
    </div>

    <!-- ESTATÍSTICAS -->
    <div class="dashboard-grid">
      <div class="stat-card">
        <div class="stat-info">
          <h3>Total de Veículos</h3>
          <div class="stat-valor" id="totalVeiculos">0</div>
        </div>
        <div class="stat-icon azul">🚗</div>
      </div>

      <div class="stat-card">
        <div class="stat-info">
          <h3>Disponíveis</h3>
          <div class="stat-valor" id="veiculosDisponiveis">0</div>
        </div>
        <div class="stat-icon verde">✓</div>
      </div>

      <div class="stat-card">
        <div class="stat-info">
          <h3>Vendidos</h3>
          <div class="stat-valor" id="veiculosVendidos">0</div>
        </div>
        <div class="stat-icon vermelho">✓</div>
      </div>

      <div class="stat-card">
        <div class="stat-info">
          <h3>Total de Visualizações</h3>
          <div class="stat-valor" id="totalVisualizacoes">0</div>
        </div>
        <div class="stat-icon roxo">👁️</div>
      </div>
    </div>

    <!-- TABELA DE VEÍCULOS -->
    <div class="card mt-4">
      <div class="card-body">
        <h5 class="card-title">Gerenciamento de Veículos</h5>
        <div class="table-responsive">
          <table class="tabela">
            <thead>
              <tr>
                <th>Título</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Status</th>
                <th>Visualizações</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody id="tabelaVeiculos">
              <!-- Preenchido por JavaScript -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL ADICIONAR/EDITAR / Com laravel -->
  <div class="modal" id="modalVeiculo">
    <div class="modal-conteudo">
      <button class="modal-fechar" onclick="fecharModal()">&times;</button>
      <h3 id="modalTitulo">Adicionar Veículo</h3>
      
      <form action="{{ route('veiculos.salvar') }}" method="POST" onsubmit="salvarVeiculo(event)">
      @csrf
      <form onsubmit="salvarVeiculo(event)">
        <div class="formulario-grupo">
          <label>Título</label>
          <input type="text" id="formTitulo" class="form-control" required>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Marca</label>
              <input type="text" id="formMarca" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Modelo</label>
              <input type="text" id="formModelo" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Cor</label>
              <input type="text" id="formCor" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Ano</label>
              <input type="number" id="formAno" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Quilometragem</label>
              <input type="number" id="formQuilometragem" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Preço</label>
              <input type="number" id="formPreco" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="formulario-grupo">
          <label>URL Imagem Principal</label>
          <input type="url" id="formImagem" class="form-control" required>
        </div>

        <div class="formulario-grupo">
          <label>URL imagem 1</label>
          <input type="url" name="fotos[]" id="formImagem" class="form-control" required>

          <label>URL imagem 2</label>
          <input type="url" name="fotos[]" id="formImagem" class="form-control" required>

          <label>URL imagem 3</label>
          <input type="url" name="fotos[]" id="formImagem" class="form-control" required>
        </div>

        <div class="formulario-grupo">
          <label>Descrição</label>
          <textarea id="formDescricao" class="form-control" rows="3" required></textarea>
        </div>

        <div class="formulario-grupo">
          <label>Status</label>
          <select id="formStatus" class="form-control" required>
            <option value="disponivel">Disponível</option>
            <option value="vendido">Vendido</option>
            <option value="inativo">Inativo</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primario btn-bloco">Salvar Veículo</button>
      </form>
      </form>
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
    let veiculosEditaveis = [...veiculos];
    let veiculoEditandoId = null;

    function carregarDashboard() {
      atualizarEstatisticas();
      renderizarTabela();
    }

    function atualizarEstatisticas() {
      const total = veiculosEditaveis.length;
      const disponiveis = veiculosEditaveis.filter(v => v.status === 'disponivel').length;
      const vendidos = veiculosEditaveis.filter(v => v.status === 'vendido').length;
      const totalVis = veiculosEditaveis.reduce((sum, v) => sum + v.visualizacoes, 0);

      document.getElementById('totalVeiculos').textContent = total;
      document.getElementById('veiculosDisponiveis').textContent = disponiveis;
      document.getElementById('veiculosVendidos').textContent = vendidos;
      document.getElementById('totalVisualizacoes').textContent = totalVis;
    }

    function renderizarTabela() {
      const container = document.getElementById('tabelaVeiculos');
      container.innerHTML = veiculosEditaveis.map(v => `
        <tr>
          <td>${v.titulo}</td>
          <td>${v.marca}</td>
          <td>${v.ano}</td>
          <td>${formatarPreco(v.preco)}</td>
          <td>
            <span class="status-badge status-${v.status}">
              ${v.status === 'disponivel' ? 'Disponível' : v.status === 'vendido' ? 'Vendido' : 'Inativo'}
            </span>
          </td>
          <td>${v.visualizacoes}</td>
          <td>
            <button class="btn btn-sm btn-warning" onclick="abrirModalEditar(${v.id})">Editar</button>
            <button class="btn btn-sm btn-danger" onclick="deletarVeiculo(${v.id})">Deletar</button>
          </td>
        </tr>
      `).join('');
    }

    function abrirModalAdicionar() {
      veiculoEditandoId = null;
      document.getElementById('modalTitulo').textContent = 'Adicionar Veículo';
      document.getElementById('formTitulo').value = '';
      document.getElementById('formMarca').value = '';
      document.getElementById('formModelo').value = '';
      document.getElementById('formCor').value = '';
      document.getElementById('formAno').value = '';
      document.getElementById('formQuilometragem').value = '';
      document.getElementById('formPreco').value = '';
      document.getElementById('formImagem').value = '';
      document.getElementById('formDescricao').value = '';
      document.getElementById('formStatus').value = 'disponivel';
      document.getElementById('modalVeiculo').classList.add('ativo');
    }

    function abrirModalEditar(id) {
      const veiculo = veiculosEditaveis.find(v => v.id === id);
      if (!veiculo) return;

      veiculoEditandoId = id;
      document.getElementById('modalTitulo').textContent = 'Editar Veículo';
      document.getElementById('formTitulo').value = veiculo.titulo;
      document.getElementById('formMarca').value = veiculo.marca;
      document.getElementById('formModelo').value = veiculo.modelo;
      document.getElementById('formCor').value = veiculo.cor;
      document.getElementById('formAno').value = veiculo.ano;
      document.getElementById('formQuilometragem').value = veiculo.quilometragem;
      document.getElementById('formPreco').value = veiculo.preco;
      document.getElementById('formImagem').value = veiculo.imagemPrincipal;
      document.getElementById('formDescricao').value = veiculo.descricao;
      document.getElementById('formStatus').value = veiculo.status;
      document.getElementById('modalVeiculo').classList.add('ativo');
    }

    function fecharModal() {
      document.getElementById('modalVeiculo').classList.remove('ativo');
    }

    function salvarVeiculo(event) {
      event.preventDefault();

      const dados = {
        titulo: document.getElementById('formTitulo').value,
        marca: document.getElementById('formMarca').value,
        modelo: document.getElementById('formModelo').value,
        cor: document.getElementById('formCor').value,
        ano: parseInt(document.getElementById('formAno').value),
        quilometragem: parseInt(document.getElementById('formQuilometragem').value),
        preco: parseInt(document.getElementById('formPreco').value),
        imagemPrincipal: document.getElementById('formImagem').value,
        descricao: document.getElementById('formDescricao').value,
        status: document.getElementById('formStatus').value
      };

      if (veiculoEditandoId) {
        // Editar
        const index = veiculosEditaveis.findIndex(v => v.id === veiculoEditandoId);
        if (index !== -1) {
          veiculosEditaveis[index] = { ...veiculosEditaveis[index], ...dados };
        }
      } else {
        // Adicionar
        const novoId = Math.max(...veiculosEditaveis.map(v => v.id), 0) + 1;
        const novoVeiculo = {
          id: novoId,
          ...dados,
          visualizacoes: 0,
          imagens: [dados.imagemPrincipal]
        };
        veiculosEditaveis.push(novoVeiculo);
      }

      fecharModal();
      atualizarEstatisticas();
      renderizarTabela();
      alert(veiculoEditandoId ? 'Veículo atualizado com sucesso!' : 'Veículo adicionado com sucesso!');
    }

    function deletarVeiculo(id) {
      if (confirm('Tem certeza que deseja deletar este veículo?')) {
        veiculosEditaveis = veiculosEditaveis.filter(v => v.id !== id);
        atualizarEstatisticas();
        renderizarTabela();
        alert('Veículo deletado com sucesso!');
      }
    }

    // Fechar modal ao clicar fora
    document.getElementById('modalVeiculo').addEventListener('click', (e) => {
      if (e.target.id === 'modalVeiculo') {
        fecharModal();
      }
    });

    // Carregar ao abrir
    carregarDashboard();
  </script>
</body>
</html>
