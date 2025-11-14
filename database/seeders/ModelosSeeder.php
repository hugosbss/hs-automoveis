<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modelos')->insert([
            // Toyota (marca_id = 1)
            ['nome' => 'Corolla', 'marca_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Hilux', 'marca_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'RAV4', 'marca_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Camry', 'marca_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            // Honda (marca_id = 2)
            ['nome' => 'Civic', 'marca_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'CR-V', 'marca_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Fit', 'marca_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'HR-V', 'marca_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            
            // Volkswagen (marca_id = 3)
            ['nome' => 'Gol', 'marca_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Polo', 'marca_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Virtus', 'marca_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'T-Cross', 'marca_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            
            // Fiat (marca_id = 4)
            ['nome' => 'Uno', 'marca_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Palio', 'marca_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Argo', 'marca_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Mobi', 'marca_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            
            // Chevrolet (marca_id = 5)
            ['nome' => 'Onix', 'marca_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Cruze', 'marca_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Tracker', 'marca_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Spin', 'marca_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            
            // Hyundai (marca_id = 6)
            ['nome' => 'HB20', 'marca_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Creta', 'marca_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Tucson', 'marca_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'i30', 'marca_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            
            // Ford (marca_id = 7)
            ['nome' => 'Ka', 'marca_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'EcoSport', 'marca_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Ranger', 'marca_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Edge', 'marca_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            
            // Renault (marca_id = 8)
            ['nome' => 'Kwid', 'marca_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Sandero', 'marca_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Duster', 'marca_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Logan', 'marca_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            
            // BMW (marca_id = 10)
            ['nome' => '320i', 'marca_id' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'X5', 'marca_id' => 10, 'created_at' => now(), 'updated_at' => now()],
            
            // Chrysler (marca_id = 11)
            ['nome' => 'C300', 'marca_id' => 11, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
