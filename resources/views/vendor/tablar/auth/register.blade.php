@extends('tablar::auth.layout')
@section('title', 'Register')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset(config('tablar.auth_logo.img.path', 'assets/logo.svg')) }}" height="36"
                    alt=""></a>
        </div>
        <form class="card card-md" action="{{ route('register') }}" method="post" autocomplete="off" novalidate>
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Registrar Nuevo Usuario</h2>
                <input type="hidden" name="role" value="coordinador">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="names" value="{{ old('names') }}"
                        class="form-control @error('names') is-invalid @enderror" placeholder="Ingresar Nombre">
                    @error('names')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="form-control @error('last_name') is-invalid @enderror" placeholder="Ingresar apellido">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">tipo de documento</label>
                    <input type="text" name="type_identification" value="{{ old('type_identification') }}"
                        class="form-control @error('type_identification') is-invalid @enderror"
                        placeholder="Ingresar Tipo de Documento">
                    @error('type_identification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero de Documento</label>
                    <input type="number_identification" name="number_identification"
                        value="{{ old('number_identification') }}"
                        class="form-control @error('number_identification') is-invalid @enderror"
                        placeholder="Ingresar Numero de identidad">
                    @error('number_identification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">tipo de sexo</label>
                    <input type="text" name="sex_user" value="{{ old('sex_user') }}"
                        class="form-control @error('sex_user') is-invalid @enderror" placeholder="Ingresar Tipo de sexo">
                    @error('sex_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Genero</label>
                    <input type="text" name="gender_sex" value="{{ old('gender_sex') }}"
                        class="form-control @error('gender_sex') is-invalid @enderror" placeholder="Ingresar genero">
                    @error('sex_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo:</label>
                    <input type="text" name="email_con" value="{{ old('email_con') }}"
                        class="form-control @error('email_con')  is-invalid @enderror" placeholder="Ingresar Correo">
                    @error('email_con')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefono:</label>
                    <input type="text" name="telephone_con" value="{{ old('telephone_con') }}"
                        class="form-control @error('telephone_con')  is-invalid @enderror"
                        placeholder="Ingresar Numero de Telefono">
                    @error('telephone_con')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Direccion:</label>
                    <input type="text" name="addres_add" value="{{ old('addres_add') }}"
                        class="form-control @error('addres_add')  is-invalid @enderror" placeholder="Ingresar Direccion">
                    @error('addres_add')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Ingresar Password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password"
                                data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                        </span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Ingresar Password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password"
                                data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                        </span>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Crear nueva cuenta</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Ya tienes cuenta? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
        </div>
    </div>
@endsection
