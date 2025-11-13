<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'HS Automoveis')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
          <a href="{{ route('perfil.show', auth()->id()) }}" class="{{ request()->routeIs('perfil.*') ? 'ativo' : '' }}">Perfil</a>
        </li>
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

  <div class="toast-container position-fixed top-50 start-50 translate-middl p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto" id="toast-title"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toast-body">
        </div>
    </div>
  </div>
  
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-coluna">
          <h3>Sobre</h3>
          <ul>
            <li><a href="{{ route('quem-somos') }}">Quem Somos</a></li>
            <li><a href="{{ route('blog-index') }}">Blog</a></li>
            <li><a href="{{ route('contato') }}">Contato</a></li>
          </ul>
        </div>
        <div class="footer-coluna">
          <h3>Comprador</h3>
          <ul>
            <li><a href="{{ route('como-comprar') }}">Como Comprar</a></li>
            <li><a href="{{ route('financiamento') }}">Financiamento</a></li>
            <li><a href="{{ route('seguro') }}">Seguro</a></li>
          </ul>
        </div>
        <div class="footer-coluna">
          <h3>Vendedor</h3>
          <ul>
            <li><a href="{{ route('vender-carro') }}">Vender Carro</a></li>
            <li><a href="{{ route('minhas-vendas') }}">Minhas Vendas</a></li>
            <li><a href="{{ route('duvidas') }}">Dúvidas</a></li>
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

  @if(Session::has('toast_success') || Session::has('toast_error'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastLiveExample = document.getElementById('liveToast');
        var toastBody = document.getElementById('toast-body');
        var toastTitle = document.getElementById('toast-title');
        var toastHeader = toastLiveExample.querySelector('.toast-header');

        @if(Session::has('toast_success'))
            toastTitle.textContent = 'Sucesso';
            toastBody.textContent = "{{ Session::get('toast_success') }}";
            toastHeader.classList.add('bg-success', 'text-white');
        @elseif(Session::has('toast_error'))
            toastTitle.textContent = 'Erro';
            toastBody.textContent = "{{ Session::get('toast_error') }}";
            toastHeader.classList.add('bg-danger', 'text-white');
        @endif

        if (toastLiveExample) {
            var toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
        }
    });
  </script>
  @endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>