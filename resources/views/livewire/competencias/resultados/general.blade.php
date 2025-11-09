<div>
    {{-- <div class="row col-md-12 mt-3">
        @foreach ($competencias as $competencia)
            <x-adminlte-callout class="col-md-6" title="{{ $competencia->competencia }}">
                @foreach ($competencia->concursantes as $concursante)
                     - {{ $concursante->nombrecompleto ?? 'S/D' }} Globlal: {{ $concursante->resultados->duracion_segundos ?? 'S/D' }} 
                @endforeach
                
            </x-adminlte-callout>
        @endforeach
    </div> --}}

    <h3 class="mb-4 text-xl font-bold">Resultados Generales por Competencia</h3>

    @forelse ($competencias as $competencia)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light fw-bold">
                {{ $competencia->competencia }}
            </div>

            <div class="card-body p-0">
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Concursante</th>
                            <th>Global</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($competencia->resultados as $index => $resultado)
                            <tr>
                                <td>{{ $resultado->concursante->nombrecompleto ?? 'S/D' }}</td>
                                <td>{{ $resultado->duracion_segundos ?? '-' }}</td>
                                <td>{{ $resultado->total ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    No hay resultados registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <p class="text-muted">No hay competencias registradas aún.</p>
    @endforelse
</div>
