@extends('tablar::page')

@section('title', 'Historial')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">

                    Servicio
                    <h2 class="page-title">
                        {{ __('historial') }}
                    </h2>
                </div>

                <div class="page-body">
                    <div class="container-xl">
                        @if (config('tablar', 'display_alert'))
                            @include('tablar::common.alert')
                        @endif

                        <x-tabulator :table="$table"  />
            @endsection
