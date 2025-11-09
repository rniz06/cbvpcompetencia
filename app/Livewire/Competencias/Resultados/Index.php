<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $buscarCompetenciaId = '', $buscarConcursanteId = '';

    public $paginado = 5;

    public $competencias = [], $concursantes = [];

    public function mount()
    {
        $this->competencias = Competencia::get(['id', 'competencia']);
        $this->concursantes = Concursante::get(['id', 'nombrecompleto']);
    }

    // Limpiar el buscador y la paginación al cambiar de pagina
    public function updating($key): void
    {
        if (in_array($key, [
            'buscarCompetenciaId',
            'buscarConcursanteId',
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
                ->buscarCompetenciaId($this->buscarCompetenciaId)
                ->buscarConcursanteId($this->buscarConcursanteId)
                ->with('competencia:id,competencia', 'concursante:id,nombrecompleto')
                ->paginate($this->paginado)
        ]);
    }
}
