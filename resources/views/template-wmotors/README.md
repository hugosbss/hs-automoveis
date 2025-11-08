# HS Automoveis - Template HTML + Bootstrap

Um template leve e responsivo de site de classificados de veículos, desenvolvido com **HTML puro**, **Bootstrap 5** e **JavaScript vanilla**. Perfeito para prototipagem rápida e desenvolvimento local.

## 🎯 Características

### Área Pública
- **Home Page**: Banner principal com busca e destaques
- **Listagem de Veículos**: Grid responsivo com filtros avançados
- **Busca em Tempo Real**: Busca por marca, modelo ou título
- **Página de Detalhes**: Visualização completa com galeria de imagens
- **Galeria de Imagens**: Navegação entre múltiplas imagens

### Área Administrativa
- **Dashboard**: Estatísticas gerais (total, disponíveis, vendidos, visualizações)
- **CRUD de Veículos**: Adicionar, editar e deletar veículos
- **Tabela Interativa**: Visualização de todos os veículos
- **Formulários Intuitivos**: Adicionar e editar veículos facilmente

## 📁 Estrutura do Projeto

```
hs-automoveis-html/
├── index.html                    # Página inicial (redireciona para home.html)
├── paginas/                      # Todas as páginas do site
│   ├── home.html                 # Página inicial com destaques
│   ├── veiculoLista.html         # Listagem com filtros
│   ├── veiculoDetalhe.html       # Detalhes do veículo com galeria
│   └── administrador.html        # Dashboard administrativo
├── assets/
│   └── css/
│       └── estilo.css            # Estilos customizados
├── js/
│   └── dados.js                  # Dados mockados e funções utilitárias
└── README.md                     # Este arquivo
```

## 🚀 Como Usar

### Opção 1: Abrir Diretamente no Navegador
1. Descompacte o arquivo ZIP
2. Abra `index.html` no navegador
3. Pronto! O site está rodando

### Opção 2: Usar um Servidor Local (Recomendado)

#### Python 3
```bash
cd hs-automoveis-html
python -m http.server 8000
```
Acesse: `http://localhost:8000`

#### Python 2
```bash
cd hs-automoveis-html
python -m SimpleHTTPServer 8000
```

#### Node.js (com http-server)
```bash
npm install -g http-server
cd hs-automoveis-html
http-server
```

#### PHP
```bash
cd hs-automoveis-html
php -S localhost:8000
```

## 📊 Rotas Disponíveis

| Arquivo | URL | Descrição |
|---------|-----|-----------|
| `paginas/home.html` | `/paginas/home.html` | Página inicial |
| `paginas/veiculoLista.html` | `/paginas/veiculoLista.html` | Listagem com filtros |
| `paginas/veiculoDetalhe.html` | `/paginas/veiculoDetalhe.html?id=1` | Detalhes do veículo |
| `paginas/administrador.html` | `/paginas/administrador.html` | Dashboard administrativo |

## 🎨 Tecnologias Utilizadas

- **HTML5**: Estrutura semântica
- **Bootstrap 5**: Framework CSS responsivo
- **CSS3**: Estilos customizados
- **JavaScript Vanilla**: Interatividade sem dependências

## 📝 Dados Mockados

O template inclui 8 veículos de exemplo em `js/dados.js`:

- Toyota Corolla 2022 - R$ 95.000
- Honda Civic 2021 - R$ 110.000
- Volkswagen Gol 2020 - R$ 65.000
- Hyundai HB20 2023 - R$ 75.000
- Fiat Uno 2019 - R$ 48.000
- Chevrolet Onix 2022 - R$ 72.000
- Renault Kwid 2021 - R$ 58.000
- Peugeot 208 2023 - R$ 85.000

### Modificar Dados

Edite `js/dados.js` para:
- Adicionar/remover veículos
- Alterar preços
- Mudar imagens (URLs)
- Ajustar informações

## 🔧 Customização

### Mudar Cores
Edite as variáveis CSS em `assets/css/estilo.css`:

```css
:root {
  --cor-primaria: #2563eb;        /* Azul principal */
  --cor-secundaria: #ef4444;      /* Vermelho */
  --cor-sucesso: #10b981;         /* Verde */
  /* ... mais cores */
}
```

### Adicionar Novo Veículo
Edite `js/dados.js` e adicione um objeto ao array `veiculos`:

```javascript
{
  id: 9,
  titulo: "Novo Carro 2024",
  marca: "Toyota",
  modelo: "Corolla",
  cor: "Branco",
  ano: 2024,
  quilometragem: 0,
  preco: 120000,
  descricao: "Descrição do veículo...",
  imagemPrincipal: "https://...",
  status: "disponivel",
  visualizacoes: 0,
  imagens: ["https://..."]
}
```

### Adicionar Nova Página
1. Crie um novo arquivo em `paginas/`
2. Copie a estrutura de outra página
3. Customize conforme necessário
4. Adicione link na navegação

## 📱 Responsividade

- ✅ Desktop (1200px+)
- ✅ Tablet (768px - 1199px)
- ✅ Mobile (até 767px)

## 🚀 Deploy

Para fazer deploy em produção:

1. **GitHub Pages**: Faça upload para um repositório GitHub
2. **Netlify**: Conecte seu repositório GitHub
3. **Vercel**: Mesmo processo do Netlify
4. **Servidor Web**: Faça upload de todos os arquivos para seu servidor

Não há dependências de build ou compilação - é tudo HTML/CSS/JS puro!

## 💡 Funcionalidades Implementadas

### Home
- ✅ Banner com busca
- ✅ Seção de recursos
- ✅ 6 veículos em destaque
- ✅ Call-to-action
- ✅ Footer com links

### Listagem
- ✅ Grid responsivo
- ✅ Filtros por marca, ano e preço
- ✅ Busca em tempo real
- ✅ Botão limpar filtros
- ✅ Mensagem quando nenhum resultado

### Detalhes
- ✅ Galeria de imagens com navegação
- ✅ Thumbnails para seleção rápida
- ✅ Informações completas
- ✅ Formulário de contato
- ✅ Veículos similares

### Admin
- ✅ Dashboard com estatísticas
- ✅ Tabela de veículos
- ✅ Adicionar veículo
- ✅ Editar veículo
- ✅ Deletar veículo
- ✅ Modal para CRUD

## 📄 Licença

MIT - Livre para uso pessoal e comercial

## 🤝 Contribuições

Sinta-se à vontade para:
- Reportar bugs
- Sugerir melhorias
- Fazer fork e customizar
- Usar como base para seu projeto

## 📞 Suporte

Para dúvidas ou problemas, consulte o código comentado ou abra uma issue.

---

**Desenvolvido com ❤️ usando HTML, Bootstrap e JavaScript**
