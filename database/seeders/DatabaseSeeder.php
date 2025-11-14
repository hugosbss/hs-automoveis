<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\UsersSeeder;
use Database\Seeders\MarcasSeeder;
use Database\Seeders\ModelosSeeder;
use Database\Seeders\CoresSeeder;
use Database\Seeders\VeiculosSeeder;
use Database\Seeders\FotoVeiculosSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MarcasSeeder::class,
            ModelosSeeder::class,
            CoresSeeder::class,
            VeiculosSeeder::class,
            FotoVeiculosSeeder::class,
        ]);
    }
}
