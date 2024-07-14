<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(
        [
            'nome'=> 'Josef Padovan',
            'email'=> 'padov.jose@padov.com',
            'endereco'=> 'Rua 300 n° 1',
            'logradouro'=>'300',
            'cep'=>'80000-000',
            'bairro'=>'Bairro alto',
        ],
        );
        Cliente::create(
            [
                'nome'=> 'Maria Padovan',
                'email'=> 'padov.maria@padov.com',
                'endereco'=> 'Rua 300 n° 1',
                'logradouro'=>'300',
                'cep'=>'80000-000',
                'bairro'=>'Bairro alto',
            ],
            );
    }
}
