<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'HS Automoveis')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/estilo.css') }}">
  @stack('styles')
</head>
<body>
  <header class="header">
    <nav class="navbar container">
      <div class="logo">
        <div class="logo-icon">HS</div>
        <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">HS Automoveis</a>
      </div>
      <ul class="nav-links ms-auto">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'ativo' : '' }}">Home</a></li>
        <li><a href="{{ route('veiculos.index') }}" class="{{ request()->routeIs('veiculos.*') ? 'ativo' : '' }}">Veículos</a></li>
        @auth
        <li><a href="{{ route('admin.veiculos') }}" class="{{ request()->routeIs('admin.*') ? 'ativo' : '' }}">Admin</a></li>
        <li>
          <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">Sair</button>
          </form>
        </li>
        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
      </ul>
    </nav>
  </header>

  @yield('content')

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
        <p>&copy; {{ date('Y') }} HS Automoveis. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>