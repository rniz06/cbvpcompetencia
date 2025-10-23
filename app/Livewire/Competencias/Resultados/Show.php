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
    public $competencia, $resultados, $competidores;
    public $btnIniciarTodo = true;
    public $btnDetenerTodo = false;
    public $tiempos = [];
    public $corriendo = [];

    public function mount($competencia)
    {
        $this->competencia = Competencia::find($competencia);

        // Trae todos los resultados con sus concursantes
        $this->resultados = Resultado::with('concursante')
            ->where('competencia_id', $competencia)
            ->orderBy('id')
            ->get();

        $this->competidores = $this->resultados->pluck('concursante');

        foreach ($this->resultados as $resultado) {
            $id = $resultado->concursante_id;

            if ($resultado->fecha_hora_inicio && !$resultado->fecha_hora_fin) {
                // Si está corriendo, calcular tiempo actual desde la BD
                $inicio = Carbon::parse($resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
                $this->tiempos[$id] = now()->diffInMilliseconds($inicio) / 1000;
                $this->corriendo[$id] = true;
                $this->btnIniciarTodo = false;
                $this->btnDetenerTodo = true;
            } elseif ($resultado->duracion_segundos) {
                // Si ya fue detenido, mostrar el tiempo final guardado
                $this->tiempos[$id] = $resultado->duracion_segundos;
                $this->corriendo[$id] = false;
            } else {
                // Sin iniciar
                $this->tiempos[$id] = 0.00;
                $this->corriendo[$id] = false;
            }
        }
    }

    public function iniciarTodo()
    {
        Resultado::where('competencia_id', $this->competencia->id)
            ->update([
                'fecha_hora_inicio' => now(),
                'fecha_hora_fin' => null,
                'duracion_segundos' => null,
                'actualizadoPor' => Auth::id(),
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
        foreach ($this->resultados as $resultado) {
            if ($resultado->fecha_hora_inicio && !$resultado->fecha_hora_fin) {
                $inicio = Carbon::parse($resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
                $fin = now();
                $duracion = abs($fin->diffInMilliseconds($inicio) / 1000);

                $resultado->update([
                    'fecha_hora_fin' => $fin,
                    'duracion_segundos' => $duracion,
                    'actualizadoPor' => Auth::id(),
                ]);

                $this->tiempos[$resultado->concursante_id] = number_format($duracion, 2);
            }
        }

        $this->btnIniciarTodo = true;
        $this->btnDetenerTodo = false;
        $this->corriendo = array_map(fn() => false, $this->corriendo);
    }

    public function detenerIndividual($concursanteId)
    {
        $resultado = Resultado::where('competencia_id', $this->competencia->id)
            ->where('concursante_id', $concursanteId)
            ->first();

        if ($resultado && $resultado->fecha_hora_inicio && !$resultado->fecha_hora_fin) {
            $inicio = Carbon::parse($resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
            $fin = now();
            $duracion = abs($fin->diffInMilliseconds($inicio) / 1000);

            $resultado->update([
                'fecha_hora_fin' => $fin,
                'duracion_segundos' => $duracion,
                'actualizadoPor' => Auth::id(),
            ]);

            $this->tiempos[$concursanteId] = number_format($duracion, 2);
        }

        $this->corriendo[$concursanteId] = false;
    }

    public function actualizarTiempos()
    {
        foreach ($this->corriendo as $id => $estado) {
            if ($estado) {
                $this->tiempos[$id] += 0.1;
            }
        }
    }

    public function render()
    {
        return view('livewire.competencias.resultados.show');
    }
}
