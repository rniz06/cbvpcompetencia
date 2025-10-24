<div>
    <div class="d-flex justify-content-between mb-3">
        <img src="{{ asset('img/logos/cbvp-logo.webp') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/directorio.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/comandancia.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/dpto-pre-hospitalar.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/chdb.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/dpto-seguridad-y-bienestar.jpeg') }}" width="150" class="rounded">
    </div>

    <hr>

    <div class="card p-4 d-flex justify-content-center align-items-center">
        @livewire('competencias.reloj')

        {{-- <div class="d-flex mb-3">
            <button wire:click="iniciarTodo" class="btn btn-sm btn-outline-success"
                @if (!$btnIniciarTodo) disabled @endif>
                <i class="fas fa-play"></i> Iniciar Todo
            </button>

            <div class="mx-2"></div>

            <button wire:click="detenerTodo" class="btn btn-sm btn-outline-danger"
                @if (!$btnDetenerTodo) disabled @endif>
                <i class="fas fa-stop"></i> Detener Todo
            </button>
        </div> --}}

        <h3 class="text-center mt-4">
            Competencia: {{ $competencia->competencia ?? 'S/D' }}
        </h3>

        <div class="row col-md-12 mt-3">
            @foreach ($competidores as $competidor)
                <x-adminlte-callout class="col-md-6">
                    <i class="fas fa-user"></i> {{ $competidor->nombrecompleto }}

                    {{-- <div class="mt-2 d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-sm btn-outline-danger"
                            wire:click="detenerIndividual({{ $competidor->id }})"
                            @if (!$corriendo[$competidor->id]) disabled @endif>
                            <i class="fas fa-stop"></i> Detener
                        </button>
                    </div> --}}

                    {{-- Subcomponente de campos --}}
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
</div>
