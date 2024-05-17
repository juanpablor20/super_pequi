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
        {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Tipo de Documento</label>
        <input type="text" name="type_identification" value="{{ old('type_identification', $user->type_identification ?? '') }}"
            class="form-control @error('type_identification') is-invalid @enderror" placeholder="Tipo de Documento">
        {!! $errors->first('type_identification', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Numero de Documento</label>
        <input type="text" name="number_identification" value="{{ old('number_identification', $user->number_identification ?? '') }}"
            class="form-control @error('number_identification') is-invalid @enderror" placeholder="Numero de Documento">
        {!! $errors->first('number_identification', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Sexo Usuario</label>
        <input type="text" name="sex_user" value="{{ old('sex_user', $user->sex_user ?? '') }}"
            class="form-control @error('sex_user') is-invalid @enderror" placeholder="Sexo">
        {!! $errors->first('sex_user', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Género</label>
        <input type="text" name="gender_sex" value="{{ old('gender_sex', $user->gender_sex ?? '') }}"
            class="form-control @error('gender_sex') is-invalid @enderror" placeholder="Género">
        {!! $errors->first('gender_sex', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Correo</label>
        <input type="text" name="email_con" value="{{ old('email_con', $user->contacts->email_con ?? '') }}"
            class="form-control @error('email_con') is-invalid @enderror" placeholder="Correo">
        {!! $errors->first('email_con', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telephone_con" value="{{ old('telephone_con', $user->contacts->telephone_con ?? '') }}"
            class="form-control @error('telephone_con') is-invalid @enderror" placeholder="Teléfono">
        {!! $errors->first('telephone_con', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Dirección</label>
        <input type="text" name="addres_add" value="{{ old('addres_add', $user->address->addres_add ?? '') }}"
            class="form-control @error('addres_add') is-invalid @enderror" placeholder="Dirección">
        {!! $errors->first('addres_add', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="mb-3 col-md-6" id="index_card_container">
        <label class="form-label">Número de ficha</label>
        <select name="index_card" class="form-select @error('index_card') is-invalid @enderror">
            <option value="">Selecciona una ficha</option>
            @foreach($ficha as $card)
                <option value="{{ $card->id }}" {{ old('index_card', $user->index_card ?? '') == $card->id ? 'selected' : '' }}>
                    {{ $card->number }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('index_card', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Rol</label>
        <div>
            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                <option value="">Selecciona un rol</option>
                <option value="aprendices" {{ old('role', $user->role) == 'aprendices' ? 'selected' : '' }}>Aprendiz</option>
                <option value="instructor" {{ old('role', $user->role) == 'instructor' ? 'selected' : '' }}>Instructor</option>
            </select>
            {!! $errors->first('role', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const indexCardContainer = document.getElementById('index_card_container');

        function toggleIndexCard() {
            if (roleSelect.value === 'aprendices') {
                indexCardContainer.style.display = '';
            } else {
                indexCardContainer.style.display = 'none';
            }
        }

        roleSelect.addEventListener('change', toggleIndexCard);
        
        // Initial check
        toggleIndexCard();
    });
</script>
