<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Resultado;
use Livewire\Component;

class General extends Component
{
    public $competencias = [];

    public function mount()
    {
        // Cargar todas las competencias con sus resultados y concursantes
        $this->competencias = Competencia::with([
            'resultados.concursante' => function ($query) {
                $query->select('id', 'nombrecompleto');
            }
        ])->get();
    }

    public function render()
    {
        return view('livewire.competencias.resultados.general', [
            'competencias' => $this->competencias,
        ]);
    }
}
