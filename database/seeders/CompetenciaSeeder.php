<?php

namespace Database\Seeders;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competencias = [
            'INDIVIDUAL MASCULINA',
            'INDIVIDUAL FEMENINA',
            'GRUPAL MIXTA',
            'GRUPAL MASCULINA',
            'GRUPAL FEMENINA'
        ];

        foreach ($competencias as $competencia) {
            Competencia::create([
                'competencia' => $competencia,
                'creadoPor' => 1, // ADMINISTRADOR
            ]);
        }

        $concursantes = [
            'JUAN PEREZ',
            'JUANA PEREZ',
            'JUAN CARLOS PEREZ',
            'JUAN RAMON PEREZ',
        ];

        foreach ($concursantes as $concursante) {
            Concursante::create([
                'nombrecompleto' => $concursante,
                'creadoPor' => 1, // ADMINISTRADOR
            ]);
        }
    }
}