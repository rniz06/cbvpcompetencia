<div>
    {{-- PROPIEDAD BUSCAR ACTIVO: {{ $buscarActivo ?? 'S/D'}} --}}
    <x-tabla titulo="Resultados" excel pdf>

        <x-slot name="headerBotones">
            <a href="{{ route('competencias.resultados.create') }}" class="btn btn-sm btn-success"><i
                    class="fas fa-plus-circle mr-2"></i>Registrar Carrera</a>
        </x-slot>
        <x-slot name="cabeceras">
            {{-- Competencia --}}
            <th>
                Competencia
            </th>

            {{-- Concursante --}}
            <th>
                Concursante
            </th>

            {{-- Hora Inicio --}}
            <th>
                Hora Inicio
            </th>

            {{-- Hora Fin --}}
            <th>
                Hora Fin
            </th>

            {{-- Acciones --}}
            <th>
                Acciones
            </th>

        </x-slot>

        @forelse ($resultados as $resultado)
            <tr>
                <td>{{ $resultado->competencia->competencia ?? 'S/D' }}</td>
                <td>{{ $resultado->concursante->nombrecompleto ?? 'S/D' }}</td>
                <td>{{ optional($resultado->fecha_hora_inicio)->format('d/m/Y H:i:s') ?? 'S/D' }}</td>
                <td>{{ optional($resultado->fecha_hora_fin)->format('d/m/Y H:i:s') ?? 'S/D' }}</td>
                <td>
                    Acciones
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100%" class="text-center text-muted">Sin resultados coincidentes...</td>
            </tr>
        @endforelse

        <x-slot name="paginacion">
            {{ $resultados->links() }}
        </x-slot>
    </x-tabla>
</div>
