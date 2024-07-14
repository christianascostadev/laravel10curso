<?php

namespace Database\Seeders;

use App\Http\Controllers\ProdutosController as ControllersProdutosController;
use Illuminate\Database\Seeder;
use Database\Seeders\ProdutosSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProdutosSeeder::class,
            ClienteSeeder::class,
        ]);
    }
}
