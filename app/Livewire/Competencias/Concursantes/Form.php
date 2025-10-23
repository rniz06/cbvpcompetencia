<?php

namespace App\Livewire\Competencias\Concursantes;

use App\Models\Competencia\Concursante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    public $concursante_id;
    #[Validate]
    public $nombrecompleto, $codigo, $categoria, $compania;
    public $modo = 'inicio'; // inicio, agregar, modificar, seleccionado

    protected $listeners = ['concursanteSeleccionado' => 'cargarConcursante'];

    protected function rules()
    {
        return [
            'nombrecompleto'  => ['required', 'max:100', Rule::unique(Concursante::class)->ignore($this->concursante_id)],
            'codigo'  => ['required', 'max:5'],
            'categoria'  => ['required', 'max:15'],
            'compania'  => ['required', 'max:100'],
        ];
    }

    public function agregar()
    {
        $this->resetearForm();
        $this->modo = 'agregar';
    }

    public function cargarConcursante($id)
    {
        $concursante = Concursante::findOrFail($id);

        $this->concursante_id  = $concursante->id;
        $this->nombrecompleto  = $concursante->nombrecompleto;
        $this->codigo          = $concursante->codigo;
        $this->categoria       = $concursante->categoria;
        $this->compania        = $concursante->compania;
        $this->modo            = 'seleccionado';
    }

    public function editar()
    {
        $this->modo = 'modificar';
    }

    public function cancelar()
    {
        $this->resetearForm();
    }

    public function eliminar()
    {
        if ($this->concursante_id) {
            Concursante::destroy($this->concursante_id);
            $this->resetearForm();
            $this->dispatch('concursanteActualizado');
        }
    }

    public function grabar()
    {
        $validados = $this->validate();

        if ($this->modo === 'agregar') {
            $validados['creadoPor'] = Auth::id();
            Concursante::create($validados);
        } elseif ($this->modo === 'modificar' && $this->concursante_id) {
            $validados['actualizadoPor'] = Auth::id();
            Concursante::findOrFail($this->concursante_id)->update($validados);
        }

        $this->resetearForm();
        $this->dispatch('concursanteActualizado');
    }

    private function resetearForm()
    {
        $this->concursante_id = null;
        $this->nombrecompleto = null;
        $this->codigo         = null;
        $this->categoria      = null;
        $this->compania       = null;
        $this->modo           = 'inicio';
    }

    public function render()
    {
        return view('livewire.competencia.concursantes.form');
    }
}
