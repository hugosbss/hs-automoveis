const veiculos = [];

function formatarPreco(preco) {
  return new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL'
  }).format(preco);
}

function formatarQuilometragem(km) {
  return new Intl.NumberFormat('pt-BR').format(km);
}

function obterVeiculo(id) {
  return veiculos.find(v => v.id === parseInt(id));
}

function obterTodosVeiculos() {
  return veiculos;
}

function filtrarVeiculos(filtros) {
  return veiculos.filter(v => {
    const marcaMatch = !filtros.marca || v.marca.toLowerCase().includes(filtros.marca.toLowerCase());
    const modeloMatch = !filtros.modelo || v.modelo.toLowerCase().includes(filtros.modelo.toLowerCase());
    const anoMatch = !filtros.anoMin || v.ano >= filtros.anoMin;
    const precoMatch = !filtros.precoMax || v.preco <= filtros.precoMax;
    const buscaMatch = !filtros.busca || v.titulo.toLowerCase().includes(filtros.busca.toLowerCase());
    
    return marcaMatch && modeloMatch && anoMatch && precoMatch && buscaMatch;
  });
}

$('#myCarousel').carousel({
  interval: false
});
$('#carousel-thumbs').carousel({
  interval: false
});
