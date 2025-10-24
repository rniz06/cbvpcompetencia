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
    public $corriendo = [];

    public function mount($competencia)
    {
        $this->competencia = Competencia::find($competencia);

        // Cargar resultados y competidores
        $this->resultados = Resultado::with('concursante')
            ->where('competencia_id', $competencia)
            ->orderBy('id')
            ->get();

        $this->competidores = $this->resultados->pluck('concursante');

        // Configurar estado de botones según BD
        foreach ($this->resultados as $resultado) {
            $id = $resultado->concursante_id;
            $this->corriendo[$id] = $resultado->fecha_hora_inicio && !$resultado->fecha_hora_fin;
        }

        // Determinar estado global
        $enCurso = $this->resultados->contains(fn($r) => $r->fecha_hora_inicio && !$r->fecha_hora_fin);
        $this->btnIniciarTodo = !$enCurso;
        $this->btnDetenerTodo = $enCurso;
    }

    public function iniciarTodo()
    {
        $ahora = now();

        Resultado::where('competencia_id', $this->competencia->id)
            ->update([
                'fecha_hora_inicio' => $ahora,
                'fecha_hora_fin' => null,
                'duracion_segundos' => null,
                'actualizadoPor' => Auth::id(),
            ]);

        $this->btnIniciarTodo = false;
        $this->btnDetenerTodo = true;

        foreach ($this->competidores as $competidor) {
            $this->corriendo[$competidor->id] = true;
        }

        // Refrescar resultados
        $this->mount($this->competencia->id);
    }

    public function detenerTodo()
    {
        foreach ($this->resultados as $resultado) {
            if ($resultado->fecha_hora_inicio && !$resultado->fecha_hora_fin) {
                $inicio = Carbon::parse($resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
                $fin = now();
                $duracion = $inicio->diffInSeconds($fin);

                $resultado->update([
                    'fecha_hora_fin' => $fin,
                    'duracion_segundos' => $duracion,
                    'actualizadoPor' => Auth::id(),
                ]);
            }
        }

        $this->btnIniciarTodo = true;
        $this->btnDetenerTodo = false;
        $this->corriendo = array_map(fn() => false, $this->corriendo);

        $this->mount($this->competencia->id);
    }

    public function detenerIndividual($concursanteId)
    {
        $resultado = Resultado::where('competencia_id', $this->competencia->id)
            ->where('concursante_id', $concursanteId)
            ->first();

        if ($resultado && $resultado->fecha_hora_inicio && !$resultado->fecha_hora_fin) {
            $inicio = Carbon::parse($resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
            $fin = now();
            $duracion = $inicio->diffInSeconds($fin);

            $resultado->update([
                'fecha_hora_fin' => $fin,
                'duracion_segundos' => $duracion,
                'actualizadoPor' => Auth::id(),
            ]);

            $this->corriendo[$concursanteId] = false;
        }

        $this->mount($this->competencia->id);
    }

    public function render()
    {
        return view('livewire.competencias.resultados.show');
    }
}
