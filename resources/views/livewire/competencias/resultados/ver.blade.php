<div>
    <div class="text-center">@livewire('competencias.reloj')</div>

    <h3 class="text-center mt-4">
        Competencia: {{ $competencia->competencia ?? 'S/D' }} - Inicio: {{ $fecha_hora_inicio ?? 'S/D' }}
    </h3>

    <div class="row col-md-12 mt-3">
        @foreach ($competidores as $competidor)
            <x-adminlte-callout class="col-md-6">
                <i class="fas fa-user"></i> {{ $competidor->nombrecompleto }}
                @livewire(
                    'competencias.resultados.campos',
                    [
                        'competidor_id' => $competidor->id,
                        'competencia_id' => $competencia->id,
                    ],
                    key("{$competencia->id}-{$competidor->id}")
                )
            </x-adminlte-callout>
        @endforeach
    </div>
</div>
