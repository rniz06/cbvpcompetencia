<div>
    {{-- Formulario --}}
    <x-adminlte-card theme="light" title="Registrar Competencia y Competidores" icon="fas fa-plus-circle" header-class="text-muted text-sm">
        <form class="row col-md-12 p-2" wire:submit="guardar">

            {{-- Competencia --}}
            <x-adminlte-select name="competencia_id" wire:model.blur="competencia_id" label-class="text-lightblue"
                wire:ignore fgroup-class="col-md-6">
                <option value="">-- Seleccionar --</option>
                @forelse ($competencias as $competencia)
                    <option value="{{ $competencia->id ?? null }}">{{ $competencia->competencia ?? 'S/D' }}</option>
                @empty
                    <option disabled>Sin Competencias Registrados</option>
                @endforelse
                <x-slot name="prependSlot">
                    <div class="input-group-text">Competencias *</div>
                </x-slot>
            </x-adminlte-select>

            {{-- Concursantes --}}
            <x-adminlte-select name="concursantes" wire:model.blur="concursantes" multiple label-class="text-lightblue" wire:ignore
                fgroup-class="col-md-6">
                @forelse ($concursantesParaSelect as $concursante)
                    <option value="{{ $concursante->id ?? null }}">{{ $concursante->nombrecompleto ?? 'S/D' }}</option>
                @empty
                    <option disabled>Sin Concursantes Registrados</option>
                @endforelse
                <x-slot name="prependSlot">
                    <div class="input-group-text">Concursantes *</div>
                </x-slot>
            </x-adminlte-select>

            {{-- Botón de Volver --}}
            <div class="form-group col-md-3 d-flex align-items-end">
                <a href="{{ route('admin.usuarios.index') }}"
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
