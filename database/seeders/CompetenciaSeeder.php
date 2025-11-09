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
            'INDIVIDUAL MASCULINO',
            'INDIVIDUAL FEMENINO',
            'MIXTO',
            'GRUPAL MASCULINO',
            'GRUPAL FEMENINO',
            'SENIOR'
        ];

        foreach ($competencias as $competencia) {
            Competencia::create([
                'competencia' => $competencia,
                'creadoPor' => 1, // ADMINISTRADOR
            ]);
        }

        $concursantes = [

            'JUAN MARTIN DUARTE VILLAALTA',
            'WILLIAM BENITEZ',
            'RAUL VERA',
            'ERNAN AGUERO',
            'RENSO JARA',
            'PEDRO MONGELOS',
            'DAVID HELLMAN',
            'JONATHAN SOSA',
            'ELADIO QUINTANA',
            'DANIEL OZUNA',
            'CHRISTIAN BENITEZ',
            'OSVALT EMILIO OLIVA',
            'ARIEL ACHUCARRO',

            'CARMEN ESPINOZA',
            'FABIOLA MONSERRAT OCAMPOS',
            'BELEN SANTACRUZ',
            'MARIA DURE',
            'SOLANA SUELI LOPEZ DIAZ',
            'SUSANA LAFARJA',
            'MABEL MIERES',

            'K2',
            'K4-1',
            'K4-2',
            'K5',
            'K18',
            'SAR',
            'PROMO 2021',
            'K1',
            'K121',
        ];

        foreach ($concursantes as $concursante) {
            Concursante::create([
                'nombrecompleto' => $concursante,
                'creadoPor' => 1, // ADMINISTRADOR
            ]);
        }
    }
}
