<?php

namespace App\Livewire\Competencias;

use Carbon\Carbon;
use Livewire\Component;

class Reloj extends Component
{
    public $horaActual;

    public function mount()
    {
        // Inicializa la hora al cargar el componente
        $this->actualizarHora();
    }

    public function actualizarHora()
    {
        $this->horaActual = Carbon::now()->format('H:i:s');
    }

    public function render()
    {
        return view('livewire.competencias.reloj');
    }
}
