<?php

namespace App\Livewire\Competencias\Resultados;

use App\Models\Competencia\Competencia;
use App\Models\Competencia\Concursante;
use App\Models\Competencia\Resultado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public $resultado;
    #[Validate]
    public $fecha_hora_inicio; // PROPIEDADES DEL FORMULARIO

    public function mount($resultado)
    {
        $this->resultado = Resultado::findOrFail($resultado);
        $this->fecha_hora_inicio = $this->resultado->fecha_hora_inicio->format('Y-m-d H:i:s');
    }

    protected function rules()
    {
        return [
            'fecha_hora_inicio'   => ['required']
        ];
    }

    public function guardar()
    {
        $this->validate();
        Resultado::where('competencia_id', $this->resultado->competencia_id)->update([
            'fecha_hora_inicio' => $this->fecha_hora_inicio ?? null,
            'actualizadoPor'         => Auth::id()
        ]);
    
        session()->flash('success', 'Resultado Modificado Correctamente!');
        $this->redirectRoute('competencias.resultados.index');
    }


    public function render()
    {
        return view('livewire.competencias.resultados.edit');
    }
}
