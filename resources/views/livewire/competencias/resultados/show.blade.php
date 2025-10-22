<div wire:poll.100ms="actualizarTiempos">
    <div class="d-flex justify-content-between">
        <img src="{{ asset('img/logos/cbvp-logo.webp') }}" class="rounded" alt="baner" width="150">
        <img src="{{ asset('img/logos/directorio.jpeg') }}" class="rounded" alt="baner" width="150">
        <img src="{{ asset('img/logos/comandancia.jpeg') }}" class="rounded" alt="baner" width="150">
        <img src="{{ asset('img/logos/dpto-pre-hospitalar.jpeg') }}" class="rounded" alt="baner" width="150">
        <img src="{{ asset('img/logos/chdb.jpeg') }}" class="rounded" alt="baner" width="150">
        <img src="{{ asset('img/logos/dpto-seguridad-y-bienestar.jpeg') }}" class="rounded" alt="baner" width="150">
    </div>
    <hr>

    <div class="card p-4 d-flex justify-content-center align-items-center">
        @livewire('competencias.reloj')
        
        <div class="d-flex mb-3">
            {{-- Iniciar Todo --}}
            <button wire:click="iniciarTodo"
                class="btn btn-sm btn-outline-success"
                @if (!$btnIniciarTodo) disabled @endif>
                <i class="fas fa-play"></i> Iniciar Todo
            </button>

            <div class="mx-2"></div>

            {{-- Detener Todo --}}
            <button wire:click="detenerTodo"
                class="btn btn-sm btn-outline-danger"
                @if (!$btnDetenerTodo) disabled @endif>
                <i class="fas fa-stop"></i> Detener Todo
            </button>
        </div>

        <h3 class="text-center mt-4">
            Competencia: {{ $competencia->competencia ?? 'S/D' }}
        </h3>

        <div class="row col-md-12 mt-3">
            @foreach ($competidores as $competidor)
                <x-adminlte-callout class="col-md-6">
                    <i class="fas fa-user"></i> {{ $competidor->nombrecompleto }}
                    <div class="mt-2 d-flex justify-content-between align-items-center">
                        {{-- Botón detener individual --}}
                        <button type="button"
                            class="btn btn-sm btn-outline-danger"
                            wire:click="detenerIndividual({{ $competidor->id }})"
                            @if (!$corriendo[$competidor->id]) disabled @endif>
                            <i class="fas fa-stop"></i> Detener
                        </button>
                        {{-- Tiempo --}}
                        <h4 class="ml-3">{{ number_format($tiempos[$competidor->id], 2) }}</h4>
                    </div>
                </x-adminlte-callout>
            @endforeach
        </div>
    </div>
</div>
