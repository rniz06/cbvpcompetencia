@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Resultados')
@section('content_header_title', 'Resultados')
@section('content_header_subtitle', 'Ver')

{{-- Content body: main page content --}}

@section('content_body')
    {{-- <div class="d-flex justify-content-between mb-3">
        <img src="{{ asset('img/logos/cbvp-logo.png') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/DN.png') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/CN.png') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/dpto-pre-hospitalar.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/chdb.jpeg') }}" width="150" class="rounded">
        <img src="{{ asset('img/logos/dpto-seguridad-y-bienestar.jpeg') }}" width="150" class="rounded">
    </div> --}}

    <div class="container">
        <div class="row text-center align-items-center">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <img src="{{ asset('img/logos/cbvp-logo.webp') }}" class="img-fluid rounded" alt="CBVP">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <img src="{{ asset('img/logos/DN.png') }}" class="img-fluid rounded" alt="Directorio">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <img src="{{ asset('img/logos/CN.png') }}" class="img-fluid rounded" alt="Comandancia">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <img src="{{ asset('img/logos/dpto-pre-hospitalar.jpeg') }}" class="img-fluid rounded"
                    alt="Dpto Pre Hospitalar">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <img src="{{ asset('img/logos/chdb.jpeg') }}" class="img-fluid rounded" alt="CHDB">
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <img src="{{ asset('img/logos/dpto-seguridad-y-bienestar.jpeg') }}" class="img-fluid rounded"
                    alt="Dpto Seguridad y Bienestar">
            </div>
        </div>
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
