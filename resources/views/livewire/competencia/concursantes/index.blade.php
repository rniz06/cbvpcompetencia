<div>
    <x-tabla titulo="Concursantes">

        <x-slot name="headerBotones">
            {{-- <a href="{{ route('competencias.concursantes.create') }}" class="btn btn-sm btn-success"><i
                    class="fas fa-user-plus"></i>Añadir Concursante</a> --}}
        </x-slot>
        <x-slot name="cabeceras">
            {{-- Nombre Completo --}}
            <th>
                <x-adminlte-input name="" wire:model.live.debounce.200ms="buscarNombrecompleto"
                    oninput="this.value = this.value.toUpperCase()" label="Nombre Completo" igroup-size="sm" />
            </th>

        </x-slot>

        @forelse ($concursantes as $concursante)
            <tr wire:click="seleccionado({{ $concursante->id }})" wire:key="{{ $concursante->id }}">
                <td>{{ $concursante->nombrecompleto ?? 'S/D' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="100%" class="text-center text-muted">Sin resultados coincidentes...</td>
            </tr>
        @endforelse

        <x-slot name="paginacion">
            {{ $concursantes->links() }}
        </x-slot>
    </x-tabla>
</div>
