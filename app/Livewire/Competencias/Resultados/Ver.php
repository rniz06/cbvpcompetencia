<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Livewire\Component;

class Ver extends Component
{
    public $competencia = null, $competidores = [], $resultados, $fecha_hora_inicio;

    public function mount($competencia)
    {
        $this->competencia = Competencia::find($competencia);
        
        $this->resultados = Resultado::with('concursante')
            ->where('competencia_id', $competencia)
            ->orderBy('id')
            ->get();

        $this->fecha_hora_inicio = Resultado::where('competencia_id', $competencia)
            ->orderBy('created_at', 'asc')
            ->first()
            ->fecha_hora_inicio
            ->format('d/m/Y H:i:s');

        $this->competidores = $this->resultados->pluck('concursante');
    }

    public function render()
    {
        return view('livewire.competencias.resultados.ver');
    }
}
