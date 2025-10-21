<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Livewire\Component;

class Show extends Component
{
    public $resultado, $titulo, $competidores;

    public function mount($competencia)
    {
        $this->titulo = Competencia::find($competencia)->competencia;
        $this->resultado = Resultado::with(['competencia', 'concursante'])->where('competencia_id', $competencia)->get();
        $this->competidores = Concursante::whereHas('resultados', function ($query) use ($competencia) {
            $query->where('competencia_id', $competencia);
        })->get();
    }

    public function render()
    {
        //return dd($this->resultado);
        return view('livewire.competencias.resultados.show');
    }
}
