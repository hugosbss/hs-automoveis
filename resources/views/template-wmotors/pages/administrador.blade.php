@extends('layouts.template')

@section('title', 'Administrador - HS Automoveis')

@section('content')
  <div class="container mt-4">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if(isset($showLogin) && $showLogin || !auth()->check())
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card shadow">
            <div class="card-body p-5">
              <div class="text-center mb-4">
                <h2 class="card-title mb-2">Acesso Administrativo</h2>
                <p class="text-muted">Faça login para acessar o painel</p>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif

              <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="redirect_to" value="{{ route('admin.veiculos') }}">

                <div class="formulario-grupo">
                  <label for="email">Email</label>
                  <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    class="@error('email') border-danger @enderror" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="seu@email.com"
                  >
                  @error('email')
                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                  @enderror
                </div>
                <div class="formulario-grupo">
                  <label for="password">Senha</label>
                  <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    class="@error('password') border-danger @enderror" 
                    required 
                    autocomplete="current-password"
                    placeholder="Sua senha"
                  >
                  @error('password')
                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                  @enderror
                </div>

                <div class="formulario-grupo">
                  <label style="display: flex; align-items: center; gap: 0.5rem; font-weight: normal; cursor: pointer;">
                    <input 
                      type="checkbox" 
                      name="remember" 
                      id="remember_me"
                      style="width: auto; margin: 0;"
                    >
                    <span>Lembrar-me</span>
                  </label>
                </div>

                <div class="formulario-grupo">
                  <button type="submit" class="btn btn-primario btn-bloco">
                    Entrar
                  </button>
                </div>
              </form>

              <div class="mt-4 text-center">
                <p class="text-muted mb-0">
                  <small>Credenciais padrão: admin@admin.com / 123456</small>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Dashboard Administrativo</h1>
        <button class="btn btn-primario" onclick="abrirModalAdicionar()">+ Adicionar Veículo</button>
      </div>

      <div class="dashboard-grid">
        <div class="stat-card">
          <div class="stat-info">
            <h3>Total de Veículos</h3>
            <div class="stat-valor">{{ $veiculos->count() }}</div>
          </div>
          <div class="stat-icon azul">🚗</div>
        </div>
        <div class="stat-card">
          <div class="stat-info">
            <h3>Marcas</h3>
            <div class="stat-valor">{{ $marcas->count() }}</div>
          </div>
          <div class="stat-icon verde">✓</div>
        </div>
        <div class="stat-card">
          <div class="stat-info">
            <h3>Modelos</h3>
            <div class="stat-valor">{{ $modelos->count() }}</div>
          </div>
          <div class="stat-icon roxo">✓</div>
        </div>
        <div class="stat-card">
          <div class="stat-info">
            <h3>Cores</h3>
            <div class="stat-valor">{{ $cores->count() }}</div>
          </div>
          <div class="stat-icon vermelho">✓</div>
        </div>
      </div>

    <ul class="nav nav-tabs mt-4" id="adminTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="veiculos-tab" data-bs-toggle="tab" data-bs-target="#veiculos" type="button">Veículos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="marcas-tab" data-bs-toggle="tab" data-bs-target="#marcas" type="button">Marcas</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="modelos-tab" data-bs-toggle="tab" data-bs-target="#modelos" type="button">Modelos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="cores-tab" data-bs-toggle="tab" data-bs-target="#cores" type="button">Cores</button>
      </li>
    </ul>

      <div class="tab-content mt-3" id="adminTabContent">
      <div class="tab-pane fade show active" id="veiculos" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gerenciamento de Veículos</h5>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cor</th>
                    <th>Ano</th>
                    <th>KM</th>
                    <th>Preço</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($veiculos as $veiculo)
                    <tr>
                      <td>{{ $veiculo->marca->nome }}</td>
                      <td>{{ $veiculo->modelo->nome }}</td>
                      <td>{{ $veiculo->cor->nome }}</td>
                      <td>{{ $veiculo->ano }}</td>
                      <td>{{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</td>
                      <td>R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</td>
                      <td>
                        <button class="btn btn-sm btn-warning" onclick="abrirModalEditar({{ $veiculo->id }})">Editar</button>
                        <form action="{{ route('admin.veiculos.destroy', $veiculo) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center">Nenhum veículo cadastrado</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="marcas" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gerenciar Marcas</h5>
            <form id="formMarca" class="mb-3">
              @csrf
              <div class="input-group">
                <input type="text" name="nome" id="marcaNome" class="form-control" placeholder="Nome da marca" required>
                <button type="submit" class="btn btn-primary">Adicionar</button>
              </div>
            </form>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody id="tabelaMarcas">
                  @foreach($marcas as $marca)
                    <tr id="marca-{{ $marca->id }}">
                      <td>{{ $marca->nome }}</td>
                      <td>
                        <button class="btn btn-sm btn-warning" onclick="editarMarca({{ $marca->id }}, '{{ $marca->nome }}')">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="deletarMarca({{ $marca->id }})">Deletar</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="modelos" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gerenciar Modelos</h5>
            <form id="formModelo" class="mb-3">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <select name="marca_id" id="modeloMarcaId" class="form-control" required>
                    <option value="">Selecione a marca</option>
                    @foreach($marcas as $marca)
                      <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <input type="text" name="nome" id="modeloNome" class="form-control" placeholder="Nome do modelo" required>
                </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary w-100">Adicionar</button>
                </div>
              </div>
            </form>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Marca</th>
                    <th>Nome</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody id="tabelaModelos">
                  @foreach($modelos as $modelo)
                    <tr id="modelo-{{ $modelo->id }}">
                      <td>{{ $modelo->marca->nome }}</td>
                      <td>{{ $modelo->nome }}</td>
                      <td>
                        <button class="btn btn-sm btn-warning" onclick="editarModelo({{ $modelo->id }}, {{ $modelo->marca_id }}, '{{ $modelo->nome }}')">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="deletarModelo({{ $modelo->id }})">Deletar</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="cores" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gerenciar Cores</h5>
            <form id="formCor" class="mb-3">
              @csrf
              <div class="input-group">
                <input type="text" name="nome" id="corNome" class="form-control" placeholder="Nome da cor" required>
                <button type="submit" class="btn btn-primary">Adicionar</button>
              </div>
            </form>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody id="tabelaCores">
                  @foreach($cores as $cor)
                    <tr id="cor-{{ $cor->id }}">
                      <td>{{ $cor->nome }}</td>
                      <td>
                        <button class="btn btn-sm btn-warning" onclick="editarCor({{ $cor->id }}, '{{ $cor->nome }}')">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="deletarCor({{ $cor->id }})">Deletar</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  <div class="modal" id="modalVeiculo">
    <div class="modal-conteudo">
      <button class="modal-fechar" onclick="fecharModal()">&times;</button>
      <h3 id="modalTitulo">Adicionar Veículo</h3>
      
      <form id="formVeiculo" method="POST">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" name="veiculo_id" id="veiculoId">

        <div class="row">
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Marca *</label>
              <select name="marca_id" id="formMarcaId" required>
                <option value="">Selecione</option>
                @foreach($marcas as $marca)
                  <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Modelo *</label>
              <select name="modelo_id" id="formModeloId" required>
                <option value="">Selecione</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Cor *</label>
              <select name="cor_id" id="formCorId" required>
                <option value="">Selecione</option>
                @foreach($cores as $cor)
                  <option value="{{ $cor->id }}">{{ $cor->nome }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Ano *</label>
              <input type="number" name="ano" id="formAno" min="1900" max="{{ date('Y') + 1 }}" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Quilometragem *</label>
              <input type="number" name="quilometragem" id="formQuilometragem" min="0" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="formulario-grupo">
              <label>Valor *</label>
              <input type="number" name="valor" id="formValor" step="0.01" min="0" required>
            </div>
          </div>
        </div>

        <div class="formulario-grupo">
          <label>URL Foto 1 *</label>
          <input type="url" name="fotos[]" class="foto-input" required>
        </div>
        <div class="formulario-grupo">
          <label>URL Foto 2 *</label>
          <input type="url" name="fotos[]" class="foto-input" required>
        </div>
        <div class="formulario-grupo">
          <label>URL Foto 3 *</label>
          <input type="url" name="fotos[]" class="foto-input" required>
        </div>

        <div class="formulario-grupo">
          <label>Descrição</label>
          <textarea name="descricao" id="formDescricao" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primario btn-bloco">Salvar Veículo</button>
      </form>
    </div>
  </div>
    @endif
  </div>
@endsection

@push('scripts')
@if(auth()->check())
<script>
  let veiculoEditandoId = null;
  const modelos = @json($modelos->groupBy('marca_id'));

  const formMarcaId = document.getElementById('formMarcaId');
  if (formMarcaId) {
    formMarcaId.addEventListener('change', function() {
    const marcaId = this.value;
    const modeloSelect = document.getElementById('formModeloId');
    modeloSelect.innerHTML = '<option value="">Selecione</option>';
    
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

  const formVeiculo = document.getElementById('formVeiculo');
  if (formVeiculo) {
    formVeiculo.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const method = document.getElementById('formMethod').value;
    const veiculoId = document.getElementById('veiculoId').value;
    
    let url = '{{ route("admin.veiculos.store") }}';
    if (method === 'PUT' && veiculoId) {
      url = '{{ route("admin.veiculos.update", ":id") }}'.replace(':id', veiculoId);
      formData.append('_method', 'PUT');
    }

    fetch(url, {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
      }
    })
    .then(response => {
      if (response.redirected) {
        window.location.href = response.url;
      } else {
        return response.json();
      }
    })
    .catch(error => {
      console.error('Erro:', error);
      alert('Erro ao salvar veículo');
    });
  });

  function abrirModalAdicionar() {
    const modal = document.getElementById('modalVeiculo');
    if (!modal) return;
    
    veiculoEditandoId = null;
    const modalTitulo = document.getElementById('modalTitulo');
    const formMethod = document.getElementById('formMethod');
    const veiculoId = document.getElementById('veiculoId');
    const form = document.getElementById('formVeiculo');
    const modeloSelect = document.getElementById('formModeloId');
    
    if (modalTitulo) modalTitulo.textContent = 'Adicionar Veículo';
    if (formMethod) formMethod.value = 'POST';
    if (veiculoId) veiculoId.value = '';
    if (form) form.reset();
    if (modeloSelect) modeloSelect.innerHTML = '<option value="">Selecione</option>';
    modal.classList.add('ativo');
  }

  function abrirModalEditar(id) {
    fetch(`{{ route('admin.veiculos.get', ':id') }}`.replace(':id', id))
      .then(response => response.json())
      .then(data => {
        veiculoEditandoId = id;
        document.getElementById('modalTitulo').textContent = 'Editar Veículo';
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('veiculoId').value = id;
        document.getElementById('formMarcaId').value = data.marca_id;
        document.getElementById('formMarcaId').dispatchEvent(new Event('change'));
        setTimeout(() => {
          document.getElementById('formModeloId').value = data.modelo_id;
        }, 200);
        document.getElementById('formCorId').value = data.cor_id;
        document.getElementById('formAno').value = data.ano;
        document.getElementById('formQuilometragem').value = data.quilometragem;
        document.getElementById('formValor').value = data.valor;
        document.getElementById('formDescricao').value = data.descricao || '';
        
        const fotoInputs = document.querySelectorAll('.foto-input');
        data.fotos.forEach((url, index) => {
          if (fotoInputs[index]) {
            fotoInputs[index].value = url;
          } else {
            const newInput = document.createElement('input');
            newInput.type = 'url';
            newInput.name = 'fotos[]';
            newInput.className = 'form-control foto-input';
            newInput.value = url;
            document.querySelector('.formulario-grupo:last-of-type').appendChild(newInput);
          }
        });
        
        document.getElementById('modalVeiculo').classList.add('ativo');
      });
  }

  function fecharModal() {
    const modal = document.getElementById('modalVeiculo');
    if (modal) modal.classList.remove('ativo');
  }
  document.getElementById('formMarca').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('{{ route("admin.marcas.store") }}', {
      method: 'POST',
      body: formData,
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    })
    .then(response => response.json())
    .then(data => {
      location.reload();
    });
  });

  function deletarMarca(id) {
    if (confirm('Tem certeza?')) {
      fetch(`/admin/marcas/${id}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'Content-Type': 'application/json'
        }
      })
      .then(() => location.reload());
    }
  }
  document.getElementById('formModelo').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('{{ route("admin.modelos.store") }}', {
      method: 'POST',
      body: formData,
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    })
    .then(response => response.json())
    .then(data => location.reload());
  });

  function deletarModelo(id) {
    if (confirm('Tem certeza?')) {
      fetch(`/admin/modelos/${id}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      })
      .then(() => location.reload());
    }
  }

  document.getElementById('formCor').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('{{ route("admin.cores.store") }}', {
      method: 'POST',
      body: formData,
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    })
    .then(response => response.json())
    .then(data => location.reload());
  });

  function deletarCor(id) {
    if (confirm('Tem certeza?')) {
      fetch(`/admin/cores/${id}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      })
      .then(() => location.reload());
    }
  }

  const modalVeiculo = document.getElementById('modalVeiculo');
  if (modalVeiculo) {
    modalVeiculo.addEventListener('click', (e) => {
      if (e.target.id === 'modalVeiculo') fecharModal();
    });
  }
</script>
@endif
@endpush