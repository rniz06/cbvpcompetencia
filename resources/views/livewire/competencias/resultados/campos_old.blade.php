<div wire:poll.1s>
    @if ($resultado)
        <div class="row text-center align-items-start">
            {{-- Escala --}}
            <div class="col-md-2">
                <button wire:click="marcarEscala" class="btn btn-outline-primary btn-sm w-100 mb-1"
                    @if ($bloquearBotones) disabled @endif>
                    Escala
                </button>
                <input type="text" readonly class="form-control text-center"
                    value="{{ optional($resultado->escala)->format('H:i:s:v') ?? '—' }}">
            </div>

            {{-- Torre --}}
            <div class="col-md-2">
                <button wire:click="marcarTorre" class="btn btn-outline-secondary btn-sm w-100 mb-1"
                    @if ($bloquearBotones) disabled @endif>
                    Torre
                </button>
                <input type="text" readonly class="form-control text-center"
                    value="{{ optional($resultado->torre)->format('H:i:s:v') ?? '—' }}">
            </div>

            {{-- Mazo --}}
            <div class="col-md-2">
                <button wire:click="marcarMazo" class="btn btn-outline-success btn-sm w-100 mb-1"
                    @if ($bloquearBotones) disabled @endif>
                    Mazo
                </button>
                <input type="text" readonly class="form-control text-center"
                    value="{{ optional($resultado->mazo)->format('H:i:s:v') ?? '—' }}">
            </div>

            {{-- Arrastre --}}
            <div class="col-md-2">
                <button wire:click="marcarArrastre" class="btn btn-outline-warning btn-sm w-100 mb-1"
                    @if ($bloquearBotones) disabled @endif>
                    Arrastre
                </button>
                <input type="text" readonly class="form-control text-center"
                    value="{{ optional($resultado->arrastre)->format('H:i:s:v') ?? '—' }}">
            </div>

            {{-- Víctima --}}
            <div class="col-md-2">
                <button wire:click="marcarVictima" class="btn btn-outline-danger btn-sm w-100 mb-1"
                    @if ($bloquearBotones) disabled @endif>
                    Víctima
                </button>
                <input type="text" readonly class="form-control text-center"
                    value="{{ optional($resultado->victima)->format('H:i:s:v') ?? '—' }}">
            </div>

            {{-- Total --}}
            <div class="col-md-2">
                <label class="btn btn-outline-dark btn-sm w-100 mb-1 disabled">Total</label>
                <input type="text" readonly class="form-control text-center"
                    value="{{ $resultado->duracion_segundos . ' Segundos' ?? '—' }}">
            </div>
        </div>
    @else
        {{-- Mostrar solo los botones mientras aún no se ha generado un resultado --}}
        <div class="d-flex flex-wrap gap-2 justify-content-center">
            <button wire:click="marcarEscala" class="btn btn-outline-primary btn-sm"
                @if ($bloquearBotones) disabled @endif>Escala</button>
            <button wire:click="marcarTorre" class="btn btn-outline-secondary btn-sm"
                @if ($bloquearBotones) disabled @endif>Torre</button>
            <button wire:click="marcarMazo" class="btn btn-outline-success btn-sm"
                @if ($bloquearBotones) disabled @endif>Mazo</button>
            <button wire:click="marcarArrastre" class="btn btn-outline-warning btn-sm"
                @if ($bloquearBotones) disabled @endif>Arrastre</button>
            <button wire:click="marcarVictima" class="btn btn-outline-danger btn-sm"
                @if ($bloquearBotones) disabled @endif>Víctima</button>
        </div>
    @endif
</div>
