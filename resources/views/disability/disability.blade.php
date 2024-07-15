@extends('tablar::page')

@section('title', 'Create Reportes')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Crear
                    </div>
                    <h2 class="page-title">
                        {{ __('Reporte por daños') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('disabilities.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            Lista de Reportes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if (config('tablar', 'display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalles</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('ReportCreate') }}" id="ajaxForm" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descripción</label>
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" rows="3" placeholder="Descripción">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="numero_documento" class="form-label">Número de Documento:</label>
                                    <input type="text" value="{{old('numero_documento')}}" class="form-control{{ $errors->has('numero_documento') ? ' is-invalid' : '' }}" id="numero_documento" name="numero_documento" value="{{ old('numero_documento') }}" required>
                                    @if ($errors->has('numero_documento'))
                                        <div class="invalid-feedback">{{ $errors->first('numero_documento') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="numero_serie" class="form-label">Número de Serie:</label>
                                    <input type="text" class="form-control{{ $errors->has('numero_serie') ? ' is-invalid' : '' }}" id="numero_serie" name="numero_serie" value="{{ old('numero_serie') }}" required>
                                    @if ($errors->has('numero_serie'))
                                        <div class="invalid-feedback">{{ $errors->first('numero_serie') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Fecha de finalización</label>
                                    <x-flat-picker name="end_date" value="{{ old('end_date') }}"></x-flat-picker>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
