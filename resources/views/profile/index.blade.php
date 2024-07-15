@extends('tablar::page')

@section('title', 'Perfil de Usuario')

@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius"
                                            alt="User-Profile-Image">
                                    </div>
                                    <h2 class="m-b-20 p.b.5 b-b-default f-w-600">Nombres</h2>
                                    <h2 class="text-muted f-w-600">{{ $user->names }}</h2>
                                    <h2 class="m-b-20 p.b.5 b-b-default f-w-600">Apellidos</h2>
                                    <h2 class="text-muted f-w-600">{{ $user->last_name }}</h2>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h1 class="m-b-20 p-b-5 b-b-default f-w-600">Información</h1>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Tipo de Identificacion</p>
                                            <h2 class="text-muted f-w-600">{{ $user->type_identification }}</h2>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Numero de Identificacion</p>
                                            <h2 class="text-muted f-w-400">{{ $user->number_identification }}</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Sexo de usuario</p>
                                            <h2 class="text-muted f-w-600">{{ $user->sex_user }}</h2>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Genero</p>
                                            <h2 class="text-muted f-w-400">{{ $user->gender_sex }}</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h2 class="text-muted f-w-600">{{ $user->contacts->email_con }}</h2>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Teléfono</p>
                                            <h2 class="text-muted f-w-400">{{ $user->contacts->telephone_con }}</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Direccion</p>
                                            <h2 class="text-muted f-w-400">{{ $user->Address->addres_add }}</h2>
                                        </div>

                                        <div class="form-footer">
                                            <div class="text-end">
                                                <div class="d-flex">
                                                    <a href="{{ route('home') }}" class="btn btn-primary">volver</a>
                                                    <a href="{{ route('perfil.edit',$user->id) }}"
                                                        class="btn btn-warning ms-auto"><i class="ti ti-edit"></i>Editar
                                                        Perfil</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
