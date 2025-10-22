<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $competencia, $resultado, $competidores;
    public $btnIniciarTodo = true;
    public $btnDetenerTodo = false;
    public $tiempos = [];
    public $corriendo = [];

    public function mount($competencia)
    {
        $this->competencia = Competencia::find($competencia);
        $this->resultado = Resultado::with(['competencia', 'concursante'])
            ->where('competencia_id', $competencia)
            ->get();

        $this->competidores = Concursante::whereHas('resultados', function ($query) use ($competencia) {
            $query->where('competencia_id', $competencia);
        })->get();

        foreach ($this->competidores as $competidor) {
            $this->tiempos[$competidor->id] = 0.00;
            $this->corriendo[$competidor->id] = false;
        }
    }

    public function iniciarTodo()
    {
        Resultado::where('competencia_id', $this->competencia->id)
            ->update([
                'fecha_hora_inicio' => now(),
                'actualizadoPor' => Auth::id(),
                'fecha_hora_fin' => null,
            ]);

        $this->btnIniciarTodo = false;
        $this->btnDetenerTodo = true;

        foreach ($this->competidores as $competidor) {
            $this->corriendo[$competidor->id] = true;
            $this->tiempos[$competidor->id] = 0.00;
        }
    }

    public function detenerTodo()
    {
        Resultado::where('competencia_id', $this->competencia->id)
            ->update([
                'fecha_hora_fin' => now(),
                'actualizadoPor' => Auth::id(),
            ]);

        $this->btnIniciarTodo = true;
        $this->btnDetenerTodo = false;

        foreach ($this->competidores as $competidor) {
            $this->corriendo[$competidor->id] = false;
        }
    }

    public function detenerIndividual($concursanteId)
    {
        $resultado = Resultado::where('competencia_id', $this->competencia->id)
            ->where('concursante_id', $concursanteId)
            ->first();

        if ($resultado && $resultado->fecha_hora_inicio) {
            $inicio = Carbon::parse($resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
            $fin = now();
            $duracion = abs($fin->diffInMilliseconds($inicio) / 1000);

            $resultado->update([
                'fecha_hora_fin'    => $fin,
                'duracion_segundos' => $duracion,
                'actualizadoPor'    => Auth::id(),
            ]);

            $this->tiempos[$concursanteId] = number_format($duracion, 2);
        }

        $this->corriendo[$concursanteId] = false;
    }

    // Este método es llamado automáticamente cada 100ms por wire:poll
    public function actualizarTiempos()
    {
        foreach ($this->competidores as $competidor) {
            if (!empty($this->corriendo[$competidor->id]) && $this->corriendo[$competidor->id]) {
                $this->tiempos[$competidor->id] += 0.1;
            }
        }
    }

    public function render()
    {
        return view('livewire.competencias.resultados.show');
    }
}
