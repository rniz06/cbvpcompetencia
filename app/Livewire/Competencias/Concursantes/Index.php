<?php

namespace App\Livewire\Competencias\Concursantes;

use App\Models\Competencia\Concursante;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $buscarNombrecompleto = '';
    public $paginado = 5;

    protected $listeners = ['concursanteActualizado' => '$refresh'];

    public function seleccionado($id)
    {
        $this->dispatch('concursanteSeleccionado', $id);
    }

    public function updating($key): void
    {
        if ($key === 'buscarNombrecompleto' || $key === 'paginado') {
            $this->resetPage();
        }
    }

    public function render()
    {
        return view('livewire.competencia.concursantes.index', [
            'concursantes' => Concursante::select('id', 'nombrecompleto')
                ->buscarNombrecompleto($this->buscarNombrecompleto)
                ->orderBy('nombrecompleto')
                ->paginate($this->paginado)
        ]);
    }
}
