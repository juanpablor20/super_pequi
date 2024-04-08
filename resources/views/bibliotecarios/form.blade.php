<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Nombre</label>
        <div>
            <input type="text" name="names"  value="{{ $user->names ?? '' }}" class="form-control @error('names') is-invalid @enderror" placeholder="Names">
            {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
            <small class="form-hint">User <b>names</b> instruction.</small>
        </div>
    </div>
    
    
    <div class="mb-3 col-md-6">
        <label class="form-label">Apellido</label>
        <div>
            <input type="text" name="last_name" value="{{ $user->last_name ?? '' }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
            <small class="form-hint">User <b>last_name</b> instruction.</small>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Tipo de Documento</label>
        <div>
            <input type="text" name="type_identification"  value="{{ $user->type_identification ?? '' }}" class="form-control @error('type_identification') is-invalid @enderror" placeholder="Type Identification">
            {!! $errors->first('type_identification', '<div class="invalid-feedback">:message</div>') !!}
            <small class="form-hint">User <b>type_identification</b> instruction.</small>
        </div>
    </div>
    
    <div class="mb-3 col-md-6">
        <label class="form-label">Numero de Documento</label>
        <div>
            <input type="text" name="number_identification" value="{{ $user->number_identification ?? '' }}" class="form-control @error('number_identification') is-invalid @enderror" placeholder="Number Identification">
            {!! $errors->first('number_identification', '<div class="invalid-feedback">:message</div>') !!}
            <small class="form-hint">User <b>number_identification</b> instruction.</small>
        </div>
    </div>
</div>
    <div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Sexo del Usuario</label>
        <div>
            <input type="text" name="sex_user" value="{{ $user->sex_user ?? '' }}" class="form-control @error('sex_user') is-invalid @enderror" placeholder="Sex User">
            {!! $errors->first('sex_user', '<div class="invalid-feedback">:message</div>') !!}
            <small class="form-hint">User <b>sex_user</b> instruction.</small>
        </div>
    </div>

    
    <div class="mb-3 col-md-6">
        <label class="form-label">Género:</label>
        <div>
            <input type="text" name="gender_sex" value="{{ $user->gender_sex ?? '' }}" class="form-control @error('gender_sex') is-invalid @enderror" placeholder="Gender Sex">
            {!! $errors->first('gender_sex', '<div class="invalid-feedback">:message</div>') !!}
            <small class="form-hint">User <b>gender_sex</b> instruction.</small>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Correo:</label>
        <div>
            <input type="text" name="email_con" value="{{ $user->contacts->email_con ?? '' }}" class="form-control @error('email_con') is-invalid @enderror" placeholder="Email">
            {!! $errors->first('email_con', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    
    <div class="mb-3 col-md-6">
        <label class="form-label">Teléfono</label>
        <div>
            <input type="text" name="telephone_con" value="{{ $user->contacts->telephone_con ?? '' }}" class="form-control @error('telephone_con') is-invalid @enderror" placeholder="Telephone">
            {!! $errors->first('telephone_con', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Dirección</label>
        <div>
            <input type="text" name="addres_add" value="{{ $user->address->addres_add ?? '' }}" class="form-control @error('addres_add') is-invalid @enderror" placeholder="Addres_add">
            {!! $errors->first('addres_add', '<div class="invalid-feedback">:message</div>') !!}
            <small class="form-hint">Admin address instruction.</small>
        </div>
    </div>
    <div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Contraseña</label>
        <div class="input-group input-group-flat">
            <input type="password" name="password" value="123456789aq"
                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                autocomplete="off">
            <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
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
        <label class="form-label">Confirmar contraseña</label>
        <div class="input-group input-group-flat">
            <input type="password" name="password_confirmation" value="123456789aq"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="Password" autocomplete="off">
            <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
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
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
    
    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
    