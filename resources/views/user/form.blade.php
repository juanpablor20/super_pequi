<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Nombre</label>
        <div>
            <input type="text" name="names" value="{{ $user->names ?? '' }}"
                class="form-control @error('names') is-invalid @enderror" placeholder="Nombre">
            {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>


    <div class="mb-3 col-md-6">
        <label class="form-label">Apellido</label>
        <div>
            <input type="text" name="last_name" value="{{ $user->last_name ?? '' }}"
                class="form-control @error('last_name') is-invalid @enderror" placeholder="Apellido">
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Tipo de Documento</label>
        <div>
            <input type="text" name="type_identification" value="{{ $user->type_identification ?? '' }}"
                class="form-control @error('type_identification') is-invalid @enderror" placeholder="Tipo de Documento">
            {!! $errors->first('type_identification', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Numero de Documento</label>
        <div>
            <input type="text" name="number_identification" value="{{ $user->number_identification ?? '' }}"
                class="form-control @error('number_identification') is-invalid @enderror"
                placeholder="Numero de Documento">
            {!! $errors->first('number_identification', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Sexo Usuario</label>
        <div>
            <input type="text" name="sex_user" value="{{ $user->sex_user ?? '' }}"
                class="form-control @error('sex_user') is-invalid @enderror" placeholder="Sexo">
            {!! $errors->first('sex_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Género</label>
        <div>
            <input type="text" name="gender_sex" value="{{ $user->gender_sex ?? '' }}"
                class="form-control @error('gender_sex') is-invalid @enderror" placeholder="Género">
            {!! $errors->first('gender_sex', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Correo</label>
        <div>
            <input type="text" name="email_con" value="{{ $user->contacts->email_con ?? '' }}"
                class="form-control @error('email_con') is-invalid @enderror" placeholder="Correo">
            {!! $errors->first('email_con', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Teléfono</label>
        <div>
            <input type="text" name="telephone_con" value="{{ $user->contacts->telephone_con ?? '' }}"
                class="form-control @error('telephone_con') is-invalid @enderror" placeholder="Teléfono">
            {!! $errors->first('telephone_con', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Dirección</label>
        <div>
            <input type="text" name="addres_add" value="{{ $user->address->addres_add ?? '' }}"
                class="form-control @error('addres_add') is-invalid @enderror" placeholder="Dirección">
            {!! $errors->first('addres_add', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="mb-3 col-md-6">
        <x-select name="index_card" :options="$ficha"></x-select>
     </div>
</div>


<div class="mb-3 col-md-6">
    <label class="form-label">Rol</label>
    <div>
        <select name="role" class="form-select @error('role') is-invalid @enderror">
            <option value="">Selecciona un rol</option>
            <option value="aprendices" {{ old('role') == 'aprendices' ? 'selected' : '' }}>Aprendiz</option>
            <option value="instructor" {{ old('role') == 'instructor' ? 'selected' : '' }}>Instructor</option>
        </select>
        {!! $errors->first('role', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para mostrar u ocultar el campo de número de ficha según el rol seleccionado
        function toggleNumeroFichaField() {
            var selectedRole = document.querySelector('[name="role"]').value;
            var numeroFichaField = document.getElementById('index_card_id');

            // Si el rol seleccionado es "aprendices", muestra el campo de número de ficha, de lo contrario, ocúltalo
            if (selectedRole === 'aprendices') {
                numeroFichaField.style.display = 'block';
            } else {
                numeroFichaField.style.display = 'none';
            }
        }

        // Ejecuta la función cuando se carga la página y cuando cambia el valor del selector de roles
        toggleNumeroFichaField();
        document.querySelector('[name="role"]').addEventListener('change', toggleNumeroFichaField);
    });
</script>

<div class="mb-3 col-md-6" id="numero_ficha" style="display: none;">
    <label class="form-label">Numero de ficha</label>
    <div>
        <input type="text" name="index_card_id" value="{{ $user->index_card_id ?? '' }}"
            class="form-control @error('index_card_id') is-invalid @enderror" placeholder="Numero de ficha">
        {!! $errors->first('index_card_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>


<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">enviar</button>
        </div>
    </div>
</div>
