<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="names" value="{{ old('names', $user->names ?? '') }}"
            class="form-control @error('names') is-invalid @enderror" placeholder="Nombre">
        @error('names')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Apellido</label>
        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}"
            class="form-control @error('last_name') is-invalid @enderror" placeholder="Apellido">
        @error('last_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Tipo de identificación:</label>
        <select name="type_identification" class="form-select @error('type_identification') is-invalid @enderror">
            <option value="">Tipo de identificación</option>
            <option value="Cedula de ciudadania"
                {{ old('type_identification', $user->type_identification ?? '') == 'Cedula de ciudadania' ? 'selected' : '' }}>
                Cédula de ciudadanía</option>
            <option value="Cedula de extranjeria"
                {{ old('type_identification', $user->type_identification ?? '') == 'Cedula de extranjeria' ? 'selected' : '' }}>
                Cédula de extranjería</option>
            <option value="Targeta de identidad"
                {{ old('type_identification', $user->type_identification ?? '') == 'Targeta de identidad' ? 'selected' : '' }}>
                Tarjeta de identidad</option>
            <option value="Permiso por proteccion temporal"
                {{ old('type_identification', $user->type_identification ?? '') == 'Permiso por proteccion temporal' ? 'selected' : '' }}>
                Permiso por protección temporal</option>
            <option value="Permiso especial de permanencia"
                {{ old('type_identification', $user->type_identification ?? '') == 'Permiso especial de permanencia' ? 'selected' : '' }}>
                Permiso especial de permanencia</option>
        </select>
        {!! $errors->first('type_identification', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Número de identificación:</label>
        <input type="number" name="number_identification"
            value="{{ old('number_identification', $user->number_identification ?? '') }}"
            class="form-control @error('number_identification') is-invalid @enderror"
            placeholder="Número de Documento">
        {!! $errors->first('number_identification', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Tipo de sexo:</label>
        <select name="sex_user" class="form-select @error('sex_user') is-invalid @enderror">
            <option value="">Selecciona un sexo</option>
            <option value="Masculino"
                {{ old('sex_user', $user->sex_user ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ old('sex_user', $user->sex_user ?? '') == 'Femenino' ? 'selected' : '' }}>
                Femenino</option>
            <option value="No_binario"
                {{ old('sex_user', $user->sex_user ?? '') == 'No_binario' ? 'selected' : '' }}>No binario</option>
        </select>
        {!! $errors->first('sex_user', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Género</label>
        <select name="gender_sex" class="form-select @error('gender_sex') is-invalid @enderror">
            <option value="">Selecciona un género</option>
            <option value="Heterosexual"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Heterosexual' ? 'selected' : '' }}>Heterosexual
            </option>
            <option value="Homosexual"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Homosexual' ? 'selected' : '' }}>Homosexual
            </option>
            <option value="Bisexual"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Bisexual' ? 'selected' : '' }}>Bisexual</option>
            <option value="Transexual"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Transexual' ? 'selected' : '' }}>Transexual
            </option>
            <option value="Intersexual"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Intersexual' ? 'selected' : '' }}>Intersexual
            </option>
            <option value="Pansexual"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Pansexual' ? 'selected' : '' }}>Pansexual
            </option>
            <option value="Asexual"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Asexual' ? 'selected' : '' }}>Asexual</option>
            <option value="Demisexual"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Demisexual' ? 'selected' : '' }}>Demisexual
            </option>
            <option value="Género fluido"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'Género fluido' ? 'selected' : '' }}>Género fluido
            </option>
            <option value="No binario"
                {{ old('gender_sex', $user->gender_sex ?? '') == 'No binario' ? 'selected' : '' }}>No binario
            </option>
        </select>
        {!! $errors->first('gender_sex', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Correo:</label>
        <input type="text" name="email_con" value="{{ old('email_con', $user->contacts->email_con ?? '') }}"
            class="form-control @error('email_con') is-invalid @enderror" placeholder="Correo">
        {!! $errors->first('email_con', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telephone_con"
            value="{{ old('telephone_con', $user->contacts->telephone_con ?? '') }}"
            class="form-control @error('telephone_con') is-invalid @enderror" placeholder="Teléfono">
        {!! $errors->first('telephone_con', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="row">
    <div class="mb-3 col-md-12">
        <label class="form-label">Dirección</label>
        <input type="text" name="addres_add" value="{{ old('addres_add', $user->address->addres_add ?? '') }}"
            class="form-control @error('addres_add') is-invalid @enderror" placeholder="Dirección">
        {!! $errors->first('addres_add', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<!-- Solo muestra los campos de contraseña si no existe un usuario -->
@if (!isset($user->names))
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label">Password:</label>
            <div class="input-group input-group-flat">
                <input type="password" id="password-input" name="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Ingresar Password"
                    autocomplete="off">
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password"
                        onclick="togglePasswordVisibility(event, 'password-input')">
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

        <div class="mb-3 col-md-6">
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
    </div>
@endif

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

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('bibliotecarios.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
        </div>
    </div>
</div>
