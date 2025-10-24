<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Carbon\Carbon;
use Livewire\Component;

class Campos extends Component
{
    public $competencia_id, $competidor_id;
    public $resultado;
    public $bloquearBotones = true; // Por defecto bloqueado

    protected $listeners = ['refreshCampos' => '$refresh'];

    public function mount($competencia_id, $competidor_id)
    {
        $this->competencia_id = $competencia_id;
        $this->competidor_id = $competidor_id;

        $this->cargarResultado();
    }

    public function cargarResultado()
    {
        $this->resultado = Resultado::where('competencia_id', $this->competencia_id)
            ->where('concursante_id', $this->competidor_id)
            ->first();

        $this->actualizarEstadoBotones();
    }

    public function actualizarEstadoBotones()
    {
        if ($this->resultado && $this->resultado->fecha_hora_inicio) {
            $inicio = Carbon::parse($this->resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
            $ahora = Carbon::now(config('app.timezone'));

            // Si la hora actual >= hora de inicio => habilitado
            $this->bloquearBotones = $ahora->lt($inicio);
        } else {
            $this->bloquearBotones = true;
        }
    }

    // ----------------------
    // MÉTODOS DE ACCIÓN
    // ----------------------

    public function marcarEscala()
    {
        $this->actualizarCampo('escala');
    }

    public function marcarTorre()
    {
        $this->actualizarCampo('torre');
    }

    public function marcarMazo()
    {
        $this->actualizarCampo('mazo');
    }

    public function marcarArrastre()
    {
        $this->actualizarCampo('arrastre');
    }

    public function marcarVictima()
    {
        $victima = Carbon::now()->format('Y-m-d H:i:s.v');
        $inicio = Carbon::parse($this->resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
        $fin = Carbon::parse($victima)->setTimezone(config('app.timezone'));
        $duracion = $inicio->diffInSeconds($fin);

        Resultado::where([['competencia_id', $this->competencia_id], ['concursante_id', $this->competidor_id]])
            ->update([
                'victima' => $victima,
                'fecha_hora_fin' => now(),
                'duracion_segundos' => $duracion,
            ]);
    }

    protected function actualizarCampo($campo)
    {
        if ($this->bloquearBotones) return;

        Resultado::where('competencia_id', $this->competencia_id)
            ->where('concursante_id', $this->competidor_id)
            ->update([$campo => Carbon::now()->format('Y-m-d H:i:s.v')]);

        $this->cargarResultado();
    }

    public function render()
    {
        // Recalcular cada segundo
        $this->actualizarEstadoBotones();

        return view('livewire.competencias.resultados.campos');
    }
}
