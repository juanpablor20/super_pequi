@extends('tablar::auth.layout')
@section('title', 'Register')
@section('content')
    <div class="container">

        <form class="card card-md-4" action="{{ route('register') }}" method="post" autocomplete="off" novalidate>
            <div class="mb-1">
                <a href="" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset(config('tablar.auth_logo.img.path', 'assets/PcFlex-logo.jpeg')) }}" height="100"
                        alt=""></a>
            </div>
            @csrf
            <div class="card-body">
                <h1 class="text-center mb-2" style="color: #000000; font-size: 2.5rem; font-weight: bold; text-transform: uppercase;">Registro Coordinacion</h1>
                <input type="hidden" name="role" value="coordinador">
                <div class="mb-3">
                     <!-- Primera Columna -->
                     <div class="row">
                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label class="form-label">Nombre:</label>
                                <input type="text" name="names" value="{{ old('names') }}"
                                    class="form-control @error('names') is-invalid @enderror"
                                    placeholder="Ingresar Nombre">
                                @error('names')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Más campos de la primera columna aquí -->


                <div class="mb-3">
                    <label class="form-label">Apellido:</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="form-control @error('last_name') is-invalid @enderror" placeholder="Ingresar apellido">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de identificacion:</label>

                    <select name="type_identification" value="{{ old('type_identification') }}"
                        class="form-select @error('type_identification') is-invalid @enderror" placeholder="Tipo de identificacion">
                       <option value="">Tipo de identificacion</option>
                       <option value="Cedula de ciudadania" {{ old('type_identification') == 'Cedula de ciudadania' ? 'selected' : '' }}>Cedula de ciudadania</option>
                       <option value="Cedula de extranjeria" {{ old('sex_usertype_identification') == 'Cedula de extranjeria' ? 'selected' : '' }}>Cedula de extranjeria</option>
                       <option value="Targeta de identidad" {{ old('type_identification') == 'Targeta de identidad' ? 'selected' : '' }}>Targeta de identidad</option>
                       <option value="Permiso por proteccion temporal" {{ old('sex_usertype_identification') == 'Permiso por proteccion temporal' ? 'selected' : '' }}>Permiso por proteccion temporal</option>
                       <option value="Permiso especial de permanencia" {{ old('type_identification') == 'Permiso especial de permanencia' ? 'selected' : '' }}>Permiso especial de permanencia</option>
                   </select>
                   {!! $errors->first('type_identification', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero de identificacion:</label>
                    <input type="number" name="number_identification"
                        value="{{ old('number_identification') }}"
                        class="form-control @error('number_identification') is-invalid @enderror"
                        placeholder="Ingresar Numero de identidad">
                    @error('number_identification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de sexo:</label>

                    <select name="sex_user" value="{{ old('sex_user') }}"
                        class="form-select @error('sex_user') is-invalid @enderror" placeholder="Sexo">
                       <option value="">Selecciona un sexo</option>
                       <option value="Masculino" {{ old('sex_user') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                       <option value="Femenino" {{ old('sex_user') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                       <option value="No_binario" {{ old('sex_user') == 'No_binario' ? 'selected' : '' }}>No_binario</option>
                   </select>
                   {!! $errors->first('sex_user', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="mb-3">
                    <label class="form-label">Genero:</label>
                    <select name="gender_sex" value="{{ old('gender_sex') }}"
                        class="form-select @error('gender_sex') is-invalid @enderror" placeholder="Genero">
                       <option value="">Selecciona un genero</option>
                       <option value="Heterosexual" {{ old('gender_sex') == 'Heterosexual' ? 'selected' : '' }}>Heterosexual</option>
                       <option value="Homosexual" {{ old('gender_sex') == 'Homosexual' ? 'selected' : '' }}>Homosexual</option>
                       <option value="Bisexual" {{ old('gender_sex') == 'Bisexual' ? 'selected' : '' }}>Bisexual</option>
                       <option value="Transexual" {{ old('gender_sex') == 'Transexual' ? 'selected' : '' }}>Transexual</option>
                       <option value="Intersexual" {{ old('gender_sex') == 'Intersexual' ? 'selected' : '' }}>Intersexual</option>
                       <option value="Pansexual" {{ old('gender_sex') == 'Pansexual' ? 'selected' : '' }}>Pansexual</option>
                       <option value="Asexual" {{ old('gender_sex') == 'Asexual' ? 'selected' : '' }}>Asexual</option>
                       <option value="Demisexual" {{ old('gender_sex') == 'Demisexual' ? 'selected' : '' }}>Demisexual</option>
                       <option value="Género fluido" {{ old('gender_sex') == 'Género fluido' ? 'selected' : '' }}>Género fluido</option>
                       <option value="No binario" {{ old('gender_sex') == 'No binario' ? 'selected' : '' }}>No binario</option>

                   </select>
                   {!! $errors->first('gender_sex', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-lg-6">


                <!-- Más campos de la segunda columna aquí -->
                <div class="mb-3">
                    <label class="form-label">Correo:</label>
                    <input type="mail" name="email_con" value="{{ old('email_con') }}"
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
                    <label class="form-label">Password:</label>
                    <div class="input-group input-group-flat">
                        <input type="password" id="password-input" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Ingresar Password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" onclick="togglePasswordVisibility(event, 'password-input')">
                                <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
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
                    <label class="form-label">Confirm Password:</label>
                    <div class="input-group input-group-flat">
                        <input type="password" id="password-confirmation-input" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Ingresar Password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password"
                                onclick="togglePasswordVisibility(event, 'password-confirmation-input')"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
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

                <script>
                    function togglePasswordVisibility(event, inputId) {
                        event.preventDefault();
                        var passwordInput = document.getElementById(inputId);
                        if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                        } else {
                            passwordInput.type = "password";
                        }
                    }
                </script>


            </div>

            </div>
            </div>
            <div class="form-footer mt-6 text-center">
                <button type="submit" class="btn btn-primary w-80 ">Crear nueva cuenta</button>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Ya tienes cuenta? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
        </div>
    </div>
@endsection
