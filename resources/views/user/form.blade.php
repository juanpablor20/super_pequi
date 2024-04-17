<div class="row">
<div class="mb-3 col-md-6">
    <label class="form-label">Nombre</label>
    <div>
        <input type="text" name="names" value="{{ $user->names ?? '' }}" class="form-control @error('names') is-invalid @enderror" placeholder="Names">
        {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>


<div class="mb-3 col-md-6">
    <label class="form-label">Apellido</label>
    <div>
        <input type="text" name="last_name" value="{{ $user->last_name ?? '' }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
        {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
</div>
<div class="row">
<div class="mb-3 col-md-6">
    <label class="form-label">Tipo de Documento</label>
    <div>
        <input type="text" name="type_identification" value="{{ $user->type_identification ?? '' }}" class="form-control @error('type_identification') is-invalid @enderror" placeholder="Type Identification">
        {!! $errors->first('type_identification', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">Numero de Documento</label>
    <div>
        <input type="text" name="number_identification" value="{{ $user->number_identification ?? '' }}" class="form-control @error('number_identification') is-invalid @enderror" placeholder="Number Identification">
        {!! $errors->first('number_identification', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
</div>
<div class="row">
<div class="mb-3 col-md-6">
    <label class="form-label">Sexo Usuario</label>
    <div>
        <input type="text" name="sex_user" value="{{ $user->sex_user ?? '' }}" class="form-control @error('sex_user') is-invalid @enderror" placeholder="Sex User">
        {!! $errors->first('sex_user', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">Género</label>
    <div>
        <input type="text" name="gender_sex" value="{{ $user->gender_sex ?? '' }}" class="form-control @error('gender_sex') is-invalid @enderror" placeholder="Gender Sex">
        {!! $errors->first('gender_sex', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
</div>
<div class="row">
<div class="mb-3 col-md-6">
    <label class="form-label">Correo</label>
    <div>
        <input type="text" name="email_con" value="{{ $contact->email_con ?? '' }}" class="form-control @error('email_con') is-invalid @enderror" placeholder="Email">
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
    </div>
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">Rol</label>
    <div>
        <select name="role" class="form-select @error('role') is-invalid @enderror">
            <option value="">Selecciona un rol</option>
            <option value="aprendiz" {{ old('role') == 'aprendices' ? 'selected' : '' }}>Aprendiz</option>
            <option value="instructor" {{ old('role') == 'instructor' ? 'selected' : '' }}>Instructor</option>
        </select>
        {!! $errors->first('role', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="mb-3 col-md-6">
    <label class="form-label">Numero de ficha</label>
    <div>
        <input type="text" name="addres_add" value="{{ $user->address->addres_add ?? '' }}" class="form-control @error('addres_add') is-invalid @enderror" placeholder="Addres_add">
        {!! $errors->first('addres_add', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>




<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="#" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">enviar</button>
        </div>
    </div>
</div>
