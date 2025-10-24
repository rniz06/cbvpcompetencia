@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Resultados')
@section('content_header_title', 'Resultados')
@section('content_header_subtitle', 'Ver')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="d-flex justify-content-between mb-3">
        <img src="{{ asset('img/logos/cbvp-logo.webp') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/directorio.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/comandancia.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/dpto-pre-hospitalar.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/chdb.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/dpto-seguridad-y-bienestar.jpeg') }}" width="150" class="rounded">
    </div>

    <hr>
    {{-- @livewire('competencias.resultados.show', ['competencia' => $competencia]) --}}
    @livewire('competencias.resultados.ver', ['competencia' => $competencia])
@stop

@push('css')
    {{-- Incluir estilos adicionales desde el componente --}}
    @stack('styles')
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- Incluir scripts js adicionales desde el componente --}}
    @stack('scripts')
@endpush
