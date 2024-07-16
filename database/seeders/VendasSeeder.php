<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Venda::create(
            [
                'numero_da_venda' => '1',
                'produto_id' => '23',
                'cliente_id' => '12',
            ]
        );
        Venda::create(
            [
                'numero_da_venda' => '2',
                'produto_id' => '18',
                'cliente_id' => '15',
            ]
        );
        

    }
}
