<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use App\Models\FotoVeiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cor;
use App\Models\User;
use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        $veiculos = [
            [
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'cor' => 'Branco',
                'ano' => 2023,
                'quilometragem' => 15000,
                'valor' => 95000,
                'descricao' => 'Toyota Corolla 2023, excelente estado, poucos km rodados. Veículo revisado e pronto para rodar.',
                'fotos' => [
                    'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1609708536965-2855c1665b41?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1552519507-da3a142c6e3d?w=500&h=400&fit=crop',
                ]
            ],
            [
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'cor' => 'Preto',
                'ano' => 2022,
                'quilometragem' => 28000,
                'valor' => 98000,
                'descricao' => 'Honda Civic 2022, sedã esportivo com motor 1.5 turbinado. Muitos acessórios originais.',
                'fotos' => [
                    'https://images.unsplash.com/photo-1617654112368-307921291f50?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1494976866556-6812c9d1c72e?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1549399542-7e3f8b83ad38?w=500&h=400&fit=crop',
                ]
            ],
            [
                'marca' => 'Volkswagen',
                'modelo' => 'Gol',
                'cor' => 'Prata',
                'ano' => 2021,
                'quilometragem' => 42000,
                'valor' => 65000,
                'descricao' => 'VW Gol 2021, compacto econômico, perfeito para uso urbano. Multimídia touchscreen.',
                'fotos' => [
                    'https://images.unsplash.com/photo-1590362891991-f776e747a588?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1609708359368-94eb76aab47e?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1542282088-fe8426682b8f?w=500&h=400&fit=crop',
                ]
            ],
            [
                'marca' => 'Fiat',
                'modelo' => 'Argo',
                'cor' => 'Vermelho',
                'ano' => 2023,
                'quilometragem' => 8000,
                'valor' => 72000,
                'descricao' => 'Fiat Argo 2023 praticamente novo, com ar condicionado e direção hidráulica. Garantia de fábrica.',
                'fotos' => [
                    'https://images.unsplash.com/photo-1552519507-da3a142c6e3d?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1494976866556-6812c9d1c72e?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1618654112368-307921291f50?w=500&h=400&fit=crop',
                ]
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Onix',
                'cor' => 'Azul',
                'ano' => 2022,
                'quilometragem' => 35000,
                'valor' => 68000,
                'descricao' => 'Chevrolet Onix 2022, sistema de som premium, pneus novos. Impecável.',
                'fotos' => [
                    'https://images.unsplash.com/photo-1609708536965-2855c1665b41?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1548575628-7aa3862d13c0?w=500&h=400&fit=crop',
                ]
            ],
            [
                'marca' => 'Hyundai',
                'modelo' => 'HB20',
                'cor' => 'Cinza',
                'ano' => 2021,
                'quilometragem' => 51000,
                'valor' => 58000,
                'descricao' => 'Hyundai HB20 2021, veículo confiável com ótimo custo-benefício. Revisões em dia.',
                'fotos' => [
                    'https://images.unsplash.com/photo-1590362891991-f776e747a588?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1609708359368-94eb76aab47e?w=500&h=400&fit=crop',
                ]
            ],
            [
                'marca' => 'Ford',
                'modelo' => 'Ka',
                'cor' => 'Bege',
                'ano' => 2020,
                'quilometragem' => 63000,
                'valor' => 45000,
                'descricao' => 'Ford Ka 2020, pequeno e ágil para a cidade. Documentação em dia e sem pendências.',
                'fotos' => [
                    'https://images.unsplash.com/photo-1542282088-fe8426682b8f?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1549399542-7e3f8b83ad38?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1615906655593-e84bf663c9b4?w=500&h=400&fit=crop',
                ]
            ],
            [
                'marca' => 'Renault',
                'modelo' => 'Kwid',
                'cor' => 'Verde',
                'ano' => 2023,
                'quilometragem' => 5000,
                'valor' => 68000,
                'descricao' => 'Renault Kwid 2023 quase novo, design moderno e robusto. SUV compacto versátil.',
                'fotos' => [
                    'https://images.unsplash.com/photo-1548575628-7aa3862d13c0?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=500&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1615906655593-e84bf663c9b4?w=500&h=400&fit=crop',
                ]
            ],
        ];
        foreach ($veiculos as $veiculoData) {
            $marca = Marca::where('nome', $veiculoData['marca'])->first();
            $modelo = Modelo::where('nome', $veiculoData['modelo'])->first();
            $cor = Cor::where('nome', $veiculoData['cor'])->first();

            if (!$marca || !$modelo || !$cor) {
                continue;
            }

            $veiculo = Veiculo::create([
                'marca_id' => $marca->id,
                'modelo_id' => $modelo->id,
                'cor_id' => $cor->id,
                'ano' => $veiculoData['ano'],
                'quilometragem' => $veiculoData['quilometragem'],
                'valor' => $veiculoData['valor'],
                'descricao' => $veiculoData['descricao'],
                'usuario_id' => $user->id,
            ]);

            foreach ($veiculoData['fotos'] as $fotoUrl) {
                FotoVeiculo::create([
                    'veiculo_id' => $veiculo->id,
                    'url' => $fotoUrl,
                ]);
            }

            echo "Veículo criado: {$marca->nome} {$modelo->nome} com " . count($veiculoData['fotos']) . " fotos\n";
        }
    }
}
