<div class="row">

    {{-- {{ $resultado }} --}}
    {{-- Escala --}}
    @if ($resultado->escala == null)
        <div class="col-sm-2">
            <div class="form-group">
                <label>Escala:</label>
                <button class="btn btn-success btn-block btn-sm" wire:click="registrarEscala({{ $resultado->id }})">Accionar</button>
            </div>
        </div>
    @else
        <x-adminlte-input name="" label="Escala:" value="{{ $resultado->escala }}" fgroup-class="col-md-2"
            disabled />
    @endif

    {{-- Torre --}}
    @if ($resultado->torre == null)
        <div class="col-sm-2">
            <div class="form-group">
                <label>Torre:</label>
                <button class="btn btn-success btn-block btn-sm" wire:click="registrarTorre({{ $resultado->id }})">Accionar</button>
            </div>
        </div>
    @else
        <x-adminlte-input name="" label="Torre:" value="{{ $resultado->torre }}" fgroup-class="col-md-2"
            disabled />
    @endif

    {{-- Mazo --}}
    @if ($resultado->mazo == null)
        <div class="col-sm-2">
            <div class="form-group">
                <label>Mazo:</label>
                <button class="btn btn-success btn-block btn-sm" wire:click="registrarMazo({{ $resultado->id }})">Accionar</button>
            </div>
        </div>
    @else
        <x-adminlte-input name="" label="Mazo:" value="{{ $resultado->mazo }}" fgroup-class="col-md-2"
            disabled />
    @endif

    {{-- Arrastre --}}
    @if ($resultado->arrastre == null)
        <div class="col-sm-2">
            <div class="form-group">
                <label>Arrastre:</label>
                <button class="btn btn-success btn-block btn-sm" wire:click="registrarArrastre({{ $resultado->id }})">Accionar</button>
            </div>
        </div>
    @else
        <x-adminlte-input name="" label="Arrastre:" value="{{ $resultado->arrastre }}" fgroup-class="col-md-2"
            disabled />
    @endif

    {{-- Victima --}}
    @if ($resultado->victima == null)
        <div class="col-sm-2">
            <div class="form-group">
                <label>Victima:</label>
                <button class="btn btn-success btn-block btn-sm" wire:click="registrarVictima({{ $resultado->id }})">Accionar</button>
            </div>
        </div>
    @else
        <x-adminlte-input name="" label="Victima:" value="{{ $resultado->victima }}" fgroup-class="col-md-2"
            disabled />
    @endif

    {{-- Total --}}
    <x-adminlte-input name="total" wire:model.blur="total" label="Total" disabled fgroup-class="col-md-2"
        igroup-size="sm" value="{{ $resultado->total ?? '' }}" />
</div>
