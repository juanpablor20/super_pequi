@extends('tablar::auth.layout')
@section('title', 'Register')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36"
                     alt=""></a>
        </div>
        <form class="card card-md" action="{{route('register')}}" method="post" autocomplete="off" novalidate>
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Registrar Nuevo Usuario</h2>
                <input type="hidden" name="role" value="coordinador">

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="names" value="carlitos medina" class="form-control @error('names') is-invalid @enderror" placeholder="Enter Nombre">
                    @error('names')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="last_name" value="migel" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter apellido">
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">tipo de documento</label>
                    <input type="text" name="type_identification" value="cc" class="form-control @error('type_identification') is-invalid @enderror" placeholder="Enter Tipo de Documento">
                    @error('type_identification')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero de Documento</label>
                    <input type="number_identification" name="number_identification" value="10004250142" class="form-control @error('number_identification') is-invalid @enderror" placeholder="Numero de identidad">
                    @error('number_identification')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">tipo de sexo</label>
                    <input type="text" name="sex_user" value="m" class="form-control @error('sex_user') is-invalid @enderror" placeholder="Enter Tipo de sexo">
                    @error('sex_user')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Genero</label>
                    <input type="text" name="gender_sex" value="el macho" class="form-control @error('gender_sex') is-invalid @enderror" placeholder="Enter genero">
                    @error('sex_user')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label">Numero de Telefono</label>
                    <input type="text" name="gender_sex" class="form-control @error('gender_sex') is-invalid @enderror" placeholder="Enter genero">
                    @error('sex_user')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
           
               
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" value="1234567890a" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                               autocomplete="off">
                        <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                            cy="12"
                                                                                                            r="2"/><path
                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
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
                        <input type="password" name="password_confirmation" value="1234567890a" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password"
                               autocomplete="off">
                        <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                            cy="12"
                                                                                                            r="2"/><path
                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                  </a>
                </span>
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Create new account</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Already have account? <a href="{{route('login')}}" tabindex="-1">Sign in</a>
        </div>
    </div>
@endsection
