<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cores')->insert([
            ['nome' => 'Branco', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Prata', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Vermelho', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Azul', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Cinza', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Bege', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Verde', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Roxo', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Preto', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
