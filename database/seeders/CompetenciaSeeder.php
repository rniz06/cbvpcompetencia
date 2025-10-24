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
            'Individual Masculino K10',
            'Individual Masculino K13',
            'Individual Masculino K122',
            'Grupal Masculino promo 2021(varias cñias)',
            'Grupal Mixto promo 2021(varias Cñias)',
            'Grupal Femenino promo 2021(varias Cñias.)',
            'Individual Femenino K4',
            'Grupal Femenino K4',
            'Grupal Femenino K4 (Equip. 2)',
            'Grupal Mixto K4',
            'Grupal Masculino K4'
        ];

        foreach ($concursantes as $concursante) {
            Concursante::create([
                'nombrecompleto' => $concursante,
                'creadoPor' => 1, // ADMINISTRADOR
            ]);
        }
    }
}