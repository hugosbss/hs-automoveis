<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcas')->insert([
            ['nome' => 'Toyota', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Honda', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Volkswagen', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Fiat', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Chevrolet', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Hyundai', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Ford', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Renault', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Porsche', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'BMW', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Chrysler', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
