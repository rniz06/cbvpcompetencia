<?php

namespace Database\Seeders;

use App\Models\Competencia\Competencia;
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
    }
}