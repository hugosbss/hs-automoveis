<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('veiculos')->insert([
            [
                'marca_id' => 1,
                'modelo_id' => 1,
                'cor_id' => 1,
                'ano' => 2023,
                'quilometragem' => 15000,
                'valor' => 95000.00,
                'descricao' => 'Toyota Corolla 2023, excelente estado, poucos km rodados. Veículo revisado e pronto para rodar.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca_id' => 3,
                'modelo_id' => 9,
                'cor_id' => 3,
                'ano' => 2021,
                'quilometragem' => 42000,
                'valor' => 65000.00,
                'descricao' => 'VW Gol 2021, compacto econômico, perfeito para uso urbano. Multimídia touchscreen.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca_id' => 5,
                'modelo_id' => 17,
                'cor_id' => 5,
                'ano' => 2022,
                'quilometragem' => 35000,
                'valor' => 82000.00,
                'descricao' => 'Chevrolet Onix Sedan 2022, sistema de som premium, pneus novos. Impecável.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca_id' => 6,
                'modelo_id' => 21,
                'cor_id' => 6,
                'ano' => 2021,
                'quilometragem' => 51000,
                'valor' => 58000.00,
                'descricao' => 'Hyundai HB20 2021, veículo confiável com ótimo custo-benefício. Revisões em dia.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca_id' => 7,
                'modelo_id' => 25,
                'cor_id' => 7,
                'ano' => 2020,
                'quilometragem' => 63000,
                'valor' => 45000.00,
                'descricao' => 'Ford Ka 2020, pequeno e ágil para a cidade. Documentação em dia e sem pendências.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca_id' => 5,
                'modelo_id' => 18,
                'cor_id' => 4,
                'ano' => 2022,
                'quilometragem' => 90000,
                'valor' => 121900.00,
                'descricao' => 'CRUZE SEMI - NOVO. Sem retoques. Teto solar. Excelente estado de conservação. Analiso troca.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca_id' => 10,
                'modelo_id' => 33,
                'cor_id' => 8,
                'ano' => 2022,
                'quilometragem' => 32000,
                'valor' => 220899.00,
                'descricao' => 'BMW ROXA REBAIXADA RENATO GARCIA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca_id' => 5,
                'modelo_id' => 17,
                'cor_id' => 5,
                'ano' => 2024,
                'quilometragem' => 15000,
                'valor' => 79900.00,
                'descricao' => 'Chevrolet Onix Hatch 1.0 12V 4P Flex Turbo 2024',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca_id' => 11,
                'modelo_id' => 35,
                'cor_id' => 9,
                'ano' => 2009,
                'quilometragem' => 380989,
                'valor' => 92590.00,
                'descricao' => 'Chrysler 300c V6 3.5 Modelo 2009. Luxo, conforto e presença que impõem respeito!',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
