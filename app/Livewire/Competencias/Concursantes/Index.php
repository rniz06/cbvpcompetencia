<?php

namespace App\Livewire\Competencias\Concursantes;

use App\Models\Competencia\Concursante;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $buscarNombrecompleto = '';
    public $buscarCategoria = '';
    public $buscarCodigo = '';
    public $buscarCompania = '';
    public $paginado = 5;

    protected $listeners = ['concursanteActualizado' => '$refresh'];

    public function seleccionado($id)
    {
        $this->dispatch('concursanteSeleccionado', $id);
    }

    public function updating($key): void
    {
        if ($key === 'buscarNombrecompleto' || $key === 'buscarCategoria' || $key === 'buscarCodigo' || $key === 'buscarCompania' || $key === 'paginado') {
            $this->resetPage();
        }
    }

    public function render()
    {
        return view('livewire.competencia.concursantes.index', [
            'concursantes' => Concursante::select('id', 'nombrecompleto', 'categoria', 'codigo', 'compania')
                ->buscarNombrecompleto($this->buscarNombrecompleto)
                ->buscarCategoria($this->buscarCategoria)
                ->buscarCodigo($this->buscarCodigo)
                ->buscarCompania($this->buscarCompania)
                ->orderBy('nombrecompleto')
                ->paginate($this->paginado)
        ]);
    }
}
