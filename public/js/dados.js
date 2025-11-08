// Dados mockados de veículos
const veiculos = [
  {
    id: 1,
    titulo: "Toyota Corolla 2022 Branco",
    marca: "Toyota",
    modelo: "Corolla",
    cor: "Branco",
    ano: 2022,
    quilometragem: 15000,
    preco: 95000,
    descricao: "Corolla 2022 em perfeito estado, revisado, com todos os documentos em dia. Veículo muito bem cuidado.",
    imagemPrincipal: "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=500&h=400&fit=crop",
    status: "disponivel",
    visualizacoes: 245,
    imagens: [
      "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=500&h=400&fit=crop",
      "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=600&h=500&fit=crop",
      "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=700&h=600&fit=crop"
    ]
  },
  {
    id: 2,
    titulo: "Honda Civic 2021 Preto",
    marca: "Honda",
    modelo: "Civic",
    cor: "Preto",
    ano: 2021,
    quilometragem: 28000,
    preco: 110000,
    descricao: "Honda Civic 2021, motor 2.0, automático. Carro muito econômico e confortável.",
    imagemPrincipal: "https://images.unsplash.com/photo-1606611013016-969c19d4a42f?w=500&h=400&fit=crop",
    status: "disponivel",
    visualizacoes: 189,
    imagens: [
      "https://images.unsplash.com/photo-1606611013016-969c19d4a42f?w=500&h=400&fit=crop",
      "https://images.unsplash.com/photo-1606611013016-969c19d4a42f?w=600&h=500&fit=crop",
      "https://images.unsplash.com/photo-1606611013016-969c19d4a42f?w=700&h=600&fit=crop"
    ]
  },
  {
    id: 3,
    titulo: "Volkswagen Gol 2020 Prata",
    marca: "Volkswagen",
    modelo: "Gol",
    cor: "Prata",
    ano: 2020,
    quilometragem: 42000,
    preco: 65000,
    descricao: "Gol 2020, motor 1.6, muito econômico. Ideal para quem procura um carro popular confiável.",
    imagemPrincipal: "https://images.unsplash.com/photo-1609708536965-59d6a8a64188?w=500&h=400&fit=crop",
    status: "disponivel",
    visualizacoes: 312,
    imagens: [
      "https://images.unsplash.com/photo-1609708536965-59d6a8a64188?w=500&h=400&fit=crop",
      "https://images.unsplash.com/photo-1609708536965-59d6a8a64188?w=600&h=500&fit=crop",
      "https://images.unsplash.com/photo-1609708536965-59d6a8a64188?w=700&h=600&fit=crop"
    ]
  },
  {
    id: 4,
    titulo: "Hyundai HB20 2023 Vermelho",
    marca: "Hyundai",
    modelo: "HB20",
    cor: "Vermelho",
    ano: 2023,
    quilometragem: 8000,
    preco: 75000,
    descricao: "HB20 2023 praticamente novo, com apenas 8 mil km. Carro econômico e moderno.",
    imagemPrincipal: "https://images.unsplash.com/photo-1617654112368-307921291f50?w=500&h=400&fit=crop",
    status: "disponivel",
    visualizacoes: 456,
    imagens: [
      "https://images.unsplash.com/photo-1617654112368-307921291f50?w=500&h=400&fit=crop",
      "https://images.unsplash.com/photo-1617654112368-307921291f50?w=600&h=500&fit=crop",
      "https://images.unsplash.com/photo-1617654112368-307921291f50?w=700&h=600&fit=crop"
    ]
  },
  {
    id: 5,
    titulo: "Fiat Uno 2019 Azul",
    marca: "Fiat",
    modelo: "Uno",
    cor: "Azul",
    ano: 2019,
    quilometragem: 55000,
    preco: 48000,
    descricao: "Uno 2019, carro pequeno e ágil, perfeito para cidade. Muito bem conservado.",
    imagemPrincipal: "https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=500&h=400&fit=crop",
    status: "disponivel",
    visualizacoes: 178,
    imagens: [
      "https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=500&h=400&fit=crop",
      "https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=600&h=500&fit=crop",
      "https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=700&h=600&fit=crop"
    ]
  },
  {
    id: 6,
    titulo: "Chevrolet Onix 2022 Cinza",
    marca: "Chevrolet",
    modelo: "Onix",
    cor: "Cinza",
    ano: 2022,
    quilometragem: 22000,
    preco: 72000,
    descricao: "Onix 2022, automático, com ar condicionado e direção hidráulica. Carro muito confortável.",
    imagemPrincipal: "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=500&h=400&fit=crop",
    status: "disponivel",
    visualizacoes: 234,
    imagens: [
      "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=500&h=400&fit=crop",
      "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=600&h=500&fit=crop",
      "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=700&h=600&fit=crop"
    ]
  },
  {
    id: 7,
    titulo: "Renault Kwid 2021 Laranja",
    marca: "Renault",
    modelo: "Kwid",
    cor: "Laranja",
    ano: 2021,
    quilometragem: 35000,
    preco: 58000,
    descricao: "Kwid 2021, carro compacto e econômico. Perfeito para quem busca praticidade.",
    imagemPrincipal: "https://images.unsplash.com/photo-1609708536965-59d6a8a64188?w=500&h=400&fit=crop",
    status: "disponivel",
    visualizacoes: 198,
    imagens: [
      "https://images.unsplash.com/photo-1609708536965-59d6a8a64188?w=500&h=400&fit=crop",
      "https://images.unsplash.com/photo-1609708536965-59d6a8a64188?w=600&h=500&fit=crop",
      "https://images.unsplash.com/photo-1609708536965-59d6a8a64188?w=700&h=600&fit=crop"
    ]
  },
  {
    id: 8,
    titulo: "Peugeot 208 2023 Branco",
    marca: "Peugeot",
    modelo: "208",
    cor: "Branco",
    ano: 2023,
    quilometragem: 5000,
    preco: 85000,
    descricao: "Peugeot 208 2023, praticamente novo. Carro moderno com tecnologia de ponta.",
    imagemPrincipal: "https://images.unsplash.com/photo-1606611013016-969c19d4a42f?w=500&h=400&fit=crop",
    status: "disponivel",
    visualizacoes: 567,
    imagens: [
      "https://images.unsplash.com/photo-1606611013016-969c19d4a42f?w=500&h=400&fit=crop",
      "https://images.unsplash.com/photo-1606611013016-969c19d4a42f?w=600&h=500&fit=crop",
      "https://images.unsplash.com/photo-1606611013016-969c19d4a42f?w=700&h=600&fit=crop"
    ]
  }
];

// Função para formatar preço em BRL
function formatarPreco(preco) {
  return new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL'
  }).format(preco);
}

// Função para formatar quilometragem
function formatarQuilometragem(km) {
  return new Intl.NumberFormat('pt-BR').format(km);
}

// Função para obter veículo por ID
function obterVeiculo(id) {
  return veiculos.find(v => v.id === parseInt(id));
}

// Função para obter todos os veículos
function obterTodosVeiculos() {
  return veiculos;
}

// Função para filtrar veículos
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
