<?php

namespace Database\Seeders;

use App\Models\Competencia\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            'INDIVIDUAL MASCULINA',
            'INDIVIDUAL FEMENINA',
            'GRUPAL MIXTA',
            'GRUPAL MASCULINA',
            'GRUPAL FEMENINA'
        ];

        foreach ($tipos as $tipo) {
            Tipo::create([
                'tipo' => $tipo,
                //'creadoPor' => 1, // ADMINISTRADOR
            ]);
        }
    }
}