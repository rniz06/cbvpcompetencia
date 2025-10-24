<div wire:poll.1s>
    <div class="d-flex flex-wrap gap-2">
        <button wire:click="marcarEscala" class="btn btn-outline-primary btn-sm"
            @if ($bloquearBotones) disabled @endif>
            Escala
        </button>

        <button wire:click="marcarTorre" class="btn btn-outline-secondary btn-sm"
            @if ($bloquearBotones) disabled @endif>
            Torre
        </button>

        <button wire:click="marcarMazo" class="btn btn-outline-success btn-sm"
            @if ($bloquearBotones) disabled @endif>
            Mazo
        </button>

        <button wire:click="marcarArrastre" class="btn btn-outline-warning btn-sm"
            @if ($bloquearBotones) disabled @endif>
            Arrastre
        </button>

        <button wire:click="marcarVictima" class="btn btn-outline-danger btn-sm"
            @if ($bloquearBotones) disabled @endif>
            Víctima
        </button>
    </div>

    <div class="mt-2">
        @if ($resultado)
            <small class="">
                Inicio: {{ optional($resultado->fecha_hora_inicio)->format('H:i:s') ?? '—' }} |
                Escala: {{ optional($resultado->escala)->format('H:i:s:v') ?? '—' }} |
                Torre: {{ optional($resultado->torre)->format('H:i:s:v') ?? '—' }} |
                Mazo: {{ optional($resultado->mazo)->format('H:i:s:v') ?? '—' }} |
                Arrastre: {{ optional($resultado->arrastre)->format('H:i:s:v') ?? '—' }} |
                Víctima: {{ optional($resultado->victima)->format('H:i:s:v') ?? '—' }}|
                Total: {{ $resultado->duracion_segundos . ' Segundos' ?? '—' }}
            </small>
        @endif
    </div>
</div>
