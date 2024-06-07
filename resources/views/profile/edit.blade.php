@extends('tablar::page')

@section('title', 'Perfil')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                  
                    <h2 class="page-title">
                        {{ __('Perfil ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
              
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalles de datos a Actualizar</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST"
                                  action="{{ route('perfil.update', $perfil->id) }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Nombre</label>
                                        <div>
                                            <input type="text" name="names"  value="{{ $perfil->names ?? '' }}" class="form-control @error('names') is-invalid @enderror" placeholder="Names">
                                            {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Apellido</label>
                                        <div>
                                            <input type="text" name="last_name" value="{{ $perfil->last_name ?? '' }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                                            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tipo de Documento</label>
                                        <div>
                                            <input type="text" name="type_identification"  value="{{ $perfil->type_identification ?? '' }}" class="form-control @error('type_identification') is-invalid @enderror" placeholder="Type Identification">
                                            {!! $errors->first('type_identification', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Numero de Documento</label>
                                        <div>
                                            <input type="text" name="number_identification" value="{{ $perfil->number_identification ?? '' }}" class="form-control @error('number_identification') is-invalid @enderror" placeholder="Number Identification">
                                            {!! $errors->first('number_identification', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Sexo del Usuario</label>
                                        <div>
                                            <input type="text" name="sex_user" value="{{ $perfil->sex_user ?? '' }}" class="form-control @error('sex_user') is-invalid @enderror" placeholder="Sex User">
                                            {!! $errors->first('sex_user', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Género:</label>
                                        <div>
                                            <input type="text" name="gender_sex" value="{{ $perfil->gender_sex ?? '' }}" class="form-control @error('gender_sex') is-invalid @enderror" placeholder="Gender Sex">
                                            {!! $errors->first('gender_sex', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Correo:</label>
                                        <div>
                                            <input type="text" name="email_con" value="{{ $perfil->contacts->email_con ?? '' }}" class="form-control @error('email_con') is-invalid @enderror" placeholder="Email">
                                            {!! $errors->first('email_con', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Teléfono</label>
                                        <div>
                                            <input type="text" name="telephone_con" value="{{ $perfil->contacts->telephone_con ?? '' }}" class="form-control @error('telephone_con') is-invalid @enderror" placeholder="Telephone">
                                            {!! $errors->first('telephone_con', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Dirección</label>
                                        <div>
                                            <input type="text" name="addres_add" value="{{ $perfil->address->addres_add ?? '' }}" class="form-control @error('addres_add') is-invalid @enderror" placeholder="Addres_add">
                                            {!! $errors->first('addres_add', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <div class="text-end">
                                            <div class="d-flex">
                                                <a href="{{ route('perfil.index') }}" class="btn btn-danger">Cancel</a>
                                                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



