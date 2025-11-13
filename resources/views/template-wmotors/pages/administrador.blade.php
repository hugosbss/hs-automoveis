@extends('layouts.template')

@section('title', 'Administrador - HS Automoveis')

@section('content')
  <div class="container mt-4">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show">
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
                  <small>admin@admin.com / 123456</small>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Dashboard Administrativo</h1>
        <a href="{{ route('admin.veiculos.criar') }}" class="btn btn-primario">+ Adicionar Veículo</a>
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
                      <td>{{ number_format($veiculo->valor, 2, ',', '.') }}</td>
                      <td>
                        <a href="{{ route('admin.veiculos.editar', $veiculo) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.veiculos.destroy', $veiculo) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este veículo? Esta ação é irreversível.');">
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
            <form id="formMarca" action="{{ route('admin.marcas.store') }}" method="POST" class="mb-3">
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
                        <a href="{{ route('admin.marcas.editar', $marca) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.marcas.destroy', $marca) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                        </form>
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
            <form id="formModelo" action="{{ route('admin.modelos.store') }}" method="POST" class="mb-3">
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
                        <a href="{{ route('admin.modelos.editar', $modelo) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.modelos.destroy', $modelo) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                        </form>
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
            <form id="formCor" action="{{ route('admin.cores.store') }}" method="POST" class="mb-3">
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
                        <a href="{{ route('admin.cores.editar', $cor) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.cores.destroy', $cor) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                        </form>
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
    @endif
  </div>
@endsection

@push('scripts')
@if(auth()->check())
<script>
  const modelos = @json($modelos->groupBy('marca_id'));
</script>
@endif
@endpush