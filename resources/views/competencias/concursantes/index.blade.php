@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Concursantes')
@section('content_header_title', 'Concursantes')
@section('content_header_subtitle', 'Listar')

{{-- Content body: main page content --}}

@section('content_body')
    @livewire('competencias.concursantes.form')
    @livewire('competencias.concursantes.index')
@stop

@section('plugins.Sweetalert2', true)

@push('css')
    {{-- Incluir estilos adicionales desde el componente --}}
    @stack('styles')
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- Incluir scripts js adicionales desde el componente --}}
    @stack('scripts')
@endpush