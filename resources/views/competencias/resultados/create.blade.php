@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Resultados')
@section('content_header_title', 'Resultados')
@section('content_header_subtitle', 'Registrar')

{{-- Content body: main page content --}}

@section('content_body')
    @livewire('competencias.resultados.create')
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