<div>
    {{-- Formulario --}}
    <x-adminlte-card theme="light" title="Registrar Competencia y Competidores" icon="fas fa-plus-circle"
        header-class="text-muted text-sm">
        <form class="row col-md-12 p-2" wire:submit="guardar">

            {{-- Fecha Hora Inicio --}}
            <x-adminlte-input type="datetime-local" name="fecha_hora_inicio" wire:model.blur="fecha_hora_inicio"
                label-class="text-lightblue" wire:ignore fgroup-class="col-md-4">
                <x-slot name="prependSlot">
                    <div class="input-group-text">Fecha Hora Inicio *</div>
                </x-slot>
            </x-adminlte-input>

            {{-- Botón de Volver --}}
            <div class="form-group col-md-3 d-flex align-items-end">
                <a href="{{ route('competencias.resultados.index') }}"
                    class="btn btn-block btn-outline-secondary text-decoration-none btn-sm"><i
                        class="fas fa-arrow-left mr-1"></i>Volver</a>
            </div>
            {{-- Botón de Guardar --}}
            <div class="form-group col-md-3 d-flex align-items-end">
                <x-adminlte-button type="submit" label="Guardar" theme="outline-success" icon="fas fa-lg fa-save"
                    class="w-100 btn-sm" />
            </div>
        </form>
    </x-adminlte-card>
</div>
