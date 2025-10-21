<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate]
    public $competencia_id, $concursantes = []; // PROPIEDADES DEL FORMULARIO

    public $concursantesParaSelect = [], $competencias = []; // PROPIEDADES PARA SELECT

    public function mount()
    {
        $this->concursantesParaSelect = Concursante::select('id','nombrecompleto')->get();
        $this->competencias = Competencia::select('id', 'competencia')->get();
    }

    protected function rules()
    {
        return [
            'competencia_id' => ['required', Rule::exists(Competencia::class, 'id')],
            'concursantes'   => ['required', 'array', 'min:2']
        ];
    }

    public function guardar()
    {
        $this->validate();

        foreach ($this->concursantes as $x) {
            Resultado::create([
                'competencia_id'    => $this->competencia_id,
                'concursante_id'    => $x,
                'fecha_hora_inicio' => null,
                'fecha_hora_fin'    => null,
                'duracion_segundos' => null,
                'creadoPor'         =>Auth::id()
            ]);
        }

        session()->flash('success', 'Rol Creado Correctamente!');
        $this->redirectRoute('competencias.resultados.index');
    }

    public function render()
    {
        return view('livewire.competencias.resultados.create');
    }
}
