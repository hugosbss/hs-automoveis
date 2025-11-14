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