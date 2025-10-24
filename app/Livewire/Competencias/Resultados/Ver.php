<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Livewire\Component;

class Ver extends Component
{
    public $competencia = null, $competidores = [], $resultados;

    public function mount($competencia)
    {
        $this->competencia = Competencia::find($competencia);
        
        $this->resultados = Resultado::with('concursante')
            ->where('competencia_id', $competencia)
            ->orderBy('id')
            ->get();

        $this->competidores = $this->resultados->pluck('concursante');
    }

    public function render()
    {
        return view('livewire.competencias.resultados.ver');
    }
}
