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
            'GRUPAL FEMENINA',
            'SENIOR'
        ];

        foreach ($competencias as $competencia) {
            Competencia::create([
                'competencia' => $competencia,
                'creadoPor' => 1, // ADMINISTRADOR
            ]);
        }

        $concursantes = [
            // 'Individual Masculino K10',
            // 'Individual Masculino K13',
            // 'Individual Masculino K122',
            // 'Grupal Masculino promo 2021(varias cñias)',
            // 'Grupal Mixto promo 2021(varias Cñias)',
            // 'Grupal Femenino promo 2021(varias Cñias.)',
            // 'Individual Femenino K4',
            // 'Grupal Femenino K4',
            // 'Grupal Femenino K4 (Equip. 2)',
            // 'Grupal Mixto K4',
            // 'Grupal Masculino K4'
            'SUELI LOPEZ',
            'MARIA DURE',
            'BELEN SANTACRUZ',
            'CAROLINA VILLAGRA',
            'MABEL MIERES',
            'FABIOLA OCAMPOS',
            'CARMEN ESPINOZA',
            'SUSANA LAFARJA',

            'JUAN DUARTE',
            'WILLIAM BENITEZ',
            'RAUL VERA',
            'CHRISTIAN BENITEZ',
            'JONATHAN SOSA',
            'DAVID HELLMAN',
            'PEDRO MONGES',

            'K4',
            'K5',
            'R1',
            'PROMO 2021',
            'K2',
            'K4-1',
            'K4-2',
            'K18',
            'SAR',
            'K2-2',
            'LA RAZA 021',
        ];

        foreach ($concursantes as $concursante) {
            Concursante::create([
                'nombrecompleto' => $concursante,
                'creadoPor' => 1, // ADMINISTRADOR
            ]);
        }
    }
}