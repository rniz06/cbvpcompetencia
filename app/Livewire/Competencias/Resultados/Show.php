<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $competencia, $resultado, $titulo, $competidores;

    public function mount($competencia)
    {
        $this->competencia = Competencia::find($competencia);
        $this->resultado = Resultado::with(['competencia', 'concursante'])->where('competencia_id', $competencia)->get();
        $this->competidores = Concursante::whereHas('resultados', function ($query) use ($competencia) {
            $query->where('competencia_id', $competencia);
        })->get();
    }

    public function iniciarTodo()
    {
        Resultado::where('competencia_id', $this->competencia->id)->update([
            'fecha_hora_inicio' => now(),
            'actualizadoPor' => Auth::id()
        ]);
    }

    public function detenerTodo()
    {
        Resultado::where('competencia_id', $this->competencia->id)->update([
            'fecha_hora_fin' => now(),
            'actualizadoPor' => Auth::id()
        ]);
    }

    public function render()
    {
        //return dd($this->resultado);
        return view('livewire.competencias.resultados.show');
    }
}
