<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Resultado;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginado = 5;

    // Limpiar el buscador y la paginación al cambiar de pagina
    public function updating($key): void
    {
        if (in_array($key, [
            'paginado',
        ])) {
            $this->resetPage();
        }
    }

    public function show($id)
    {
        return redirect()->route('competencias.resultados.show', $id);    
    }

    public function render()
    {
        return view('livewire.competencias.resultados.index', [
            'resultados' => Resultado::select('id', 'competencia_id', 'concursante_id', 'fecha_hora_inicio', 'fecha_hora_fin', 'duracion_segundos')
                ->with('competencia:id,competencia', 'concursante:id,nombrecompleto')
                ->paginate($this->paginado)
        ]);
    }
}
