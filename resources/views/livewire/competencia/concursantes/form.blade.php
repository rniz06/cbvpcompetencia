<div>
    {{-- Formulario --}}
    {{-- <x-adminlte-card theme="light" title="Añadir Concursante" icon="fas fa-plus-circle" header-class="text-muted text-sm">
        <form class="row col-md-12 p-2" wire:submit="grabar">

            <x-adminlte-input name="nombrecompleto" wire:model.blur="nombrecompleto"
                oninput="this.value = this.value.toUpperCase()" placeholder="EJ: JUAN PEREZ" label-class="text-lightblue"
                fgroup-class="col-md-12" igroup-size="sm" :disabled="in_array($modo, ['inicio', 'seleccionado'])">
                <x-slot name="prependSlot">
                    <div class="input-group-text">Nombre Completo *</div>
                </x-slot>
            </x-adminlte-input>

            <div class="card-footer">
                <x-adminlte-button type="button" label="Agregar" theme="success" icon="fas fa-lg fa-plus"
                    wire:click="agregar" :disabled="in_array($modo, ['agregar', 'modificar', 'seleccionado'])" />

                <x-adminlte-button type="button" label="Modificar" theme="warning" icon="fas fa-lg fa-edit"
                    wire:click="editar" :disabled="in_array($modo, ['inicio', 'modificar', 'agregar'])" />

                <x-adminlte-button type="button" label="Eliminar" theme="danger" icon="fas fa-lg fa-trash"
                    id="btn-eliminar" :disabled="in_array($modo, ['agregar', 'modificar', 'inicio'])" />

                <x-adminlte-button type="button" label="Grabar" theme="default" icon="fas fa-lg fa-save"
                    id="btn-grabar" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

                <x-adminlte-button type="button" label="Cancelar" theme="secondary" icon="fas fa-lg fa-window-close"
                    wire:click="cancelar" :disabled="in_array($modo, ['inicio'])" />
            </div>
        </form>
    </x-adminlte-card> --}}
    <div class="card card-success card-outline p-2">
        {{-- Formulario --}}
        <form class="row" wire:submit="grabar">
            {{-- Nombre --}}
            <x-adminlte-input name="nombrecompleto" label="Nombre Completo:" placeholder="Ej: JUAN PEREZ..."
                fgroup-class="col-md-3" igroup-size="sm" oninput="this.value = this.value.toUpperCase()"
                wire:model.blur="nombrecompleto" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

            {{-- Categoria --}}
            <x-adminlte-input name="categoria" label="Categoria:" placeholder="Ej: COMBATIENTE O ACTIVO"
                fgroup-class="col-md-3" igroup-size="sm" oninput="this.value = this.value.toUpperCase()"
                wire:model.blur="categoria" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

            {{-- Código --}}
            <x-adminlte-input name="codigo" label="Código:" placeholder="Ej: 7802" fgroup-class="col-md-3"
                igroup-size="sm" wire:model.blur="codigo" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

            {{-- Compania --}}
            <x-adminlte-input name="compania" label="Compañia:" placeholder="Ej: K126" fgroup-class="col-md-3"
                igroup-size="sm" wire:model.blur="compania" oninput="this.value = this.value.toUpperCase()"
                :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

            {{-- Botones --}}
            <div class="card-footer">
                <x-adminlte-button type="button" label="Agregar" theme="success" icon="fas fa-lg fa-plus"
                    wire:click="agregar" :disabled="in_array($modo, ['agregar', 'modificar', 'seleccionado'])" />

                <x-adminlte-button type="button" label="Modificar" theme="warning" icon="fas fa-lg fa-edit"
                    wire:click="editar" :disabled="in_array($modo, ['inicio', 'modificar', 'agregar'])" />

                <x-adminlte-button type="button" label="Eliminar" theme="danger" icon="fas fa-lg fa-trash"
                    id="btn-eliminar" :disabled="in_array($modo, ['agregar', 'modificar', 'inicio'])" />

                <x-adminlte-button type="button" label="Grabar" theme="default" icon="fas fa-lg fa-save"
                    id="btn-grabar" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

                <x-adminlte-button type="button" label="Cancelar" theme="secondary" icon="fas fa-lg fa-window-close"
                    wire:click="cancelar" :disabled="in_array($modo, ['inicio'])" />
            </div>
        </form>
    </div>
</div>

@push('scripts')
    {{-- Script para boton guardar --}}
    <script>
        const btnGuardar = document.getElementById('btn-grabar');
        if (btnGuardar) {
            btnGuardar.addEventListener('click', function() {
                // Obtener el modo actual directamente de Livewire                 
                const modoActual = @this.get('modo');

                let titulo = modoActual === 'modificar' ? 'MODIFICAR' : 'AGREGAR';
                let mensaje = modoActual === 'modificar' ? '¿DESEAS ACTUALIZAR EL REGISTRO?' :
                    '¿DESEAS GRABAR EL NUEVO REGISTRO?';
                let respuesta = modoActual === 'modificar' ? 'Registro Actualizado Con Éxito' :
                    'Registro Creado Con Éxito';

                Swal.fire({
                    title: titulo,
                    text: mensaje,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#458E49",
                    confirmButtonText: "SI",
                    cancelButtonText: "NO",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.grabar();
                        Swal.fire({
                            title: "Respuesta",
                            text: respuesta,
                            icon: "success"
                        });
                    }
                });
            });
        }
    </script>

    {{-- Script para boton eliminar --}}
    <script>
        const btnEliminar = document.getElementById('btn-eliminar');
        if (btnEliminar) {
            btnEliminar.addEventListener('click', function() {
                Swal.fire({
                    title: "ELIMINAR",
                    text: "¿DESEAS ELIMINAR EL REGISTRO SELECCIONADO?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#458E49",
                    confirmButtonText: "SI",
                    cancelButtonText: "NO",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.eliminar();
                        Swal.fire({
                            title: "Respuesta",
                            text: "Registro Eliminado Con Exito",
                            icon: "success"
                        });
                    }
                });
            });
        }
    </script>
@endpush
