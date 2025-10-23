<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Carbon\Carbon;
use Livewire\Component;

class Campos extends Component
{
    public $resultado;

    public function mount($competidor_id, $competencia_id)
    {
        $this->resultado = Resultado::where([['competencia_id', $competencia_id], ['concursante_id', $competidor_id]])->first();
    }

    public function registrarEscala($id)
    {
        $inicio = Carbon::parse($this->resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
        $fin = now();
        $duracion = abs($fin->diffInMilliseconds($inicio) / 1000);

        Resultado::findOrFail($id)->update([
            'escala' => $duracion ?? null,
            'total'  => $this->resultado->total + $duracion ?? null
        ]);

        // Refrescar el modelo en la instancia actual del componente
        $this->resultado = $this->resultado->fresh();
    }

    public function registrarTorre($id)
    {
        $inicio = Carbon::parse($this->resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
        $fin = now();
        $duracion = abs($fin->diffInMilliseconds($inicio) / 1000);

        Resultado::findOrFail($id)->update([
            'torre' => $duracion ?? null,
            'total'  => $this->resultado->total + $duracion ?? null
        ]);

        // Refrescar el modelo en la instancia actual del componente
        $this->resultado = $this->resultado->fresh();
    }

    public function registrarMazo($id)
    {
        $inicio = Carbon::parse($this->resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
        $fin = now();
        $duracion = abs($fin->diffInMilliseconds($inicio) / 1000);

        Resultado::findOrFail($id)->update([
            'mazo' => $duracion ?? null,
            'total'  => $this->resultado->total + $duracion ?? null
        ]);

        // Refrescar el modelo en la instancia actual del componente
        $this->resultado = $this->resultado->fresh();
    }

    public function registrarArrastre($id)
    {
        $inicio = Carbon::parse($this->resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
        $fin = now();
        $duracion = abs($fin->diffInMilliseconds($inicio) / 1000);

        Resultado::findOrFail($id)->update([
            'arrastre' => $duracion ?? null,
            'total'  => $this->resultado->total + $duracion ?? null
        ]);

        // Refrescar el modelo en la instancia actual del componente
        $this->resultado = $this->resultado->fresh();
    }

    public function registrarVictima($id)
    {
        $inicio = Carbon::parse($this->resultado->fecha_hora_inicio)->setTimezone(config('app.timezone'));
        $fin = now();
        $duracion = abs($fin->diffInMilliseconds($inicio) / 1000);

        Resultado::findOrFail($id)->update([
            'victima' => $duracion ?? null,
            'total'  => $this->resultado->total + $duracion ?? null
        ]);

        // Refrescar el modelo en la instancia actual del componente
        $this->resultado = $this->resultado->fresh();
    }

    public function render()
    {
        //return dd($this->resultado);
        return view('livewire.competencias.resultados.campos');
    }
}
