
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('name_user') }}</label>
    <div>
        {{ Form::text('name_user', $admin->name_user, ['class' => 'form-control' .
        ($errors->has('name_user') ? ' is-invalid' : ''), 'placeholder' => 'Name User']) }}
        {!! $errors->first('name_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">admin <b>name_user</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('last_name_user') }}</label>
    <div>
        {{ Form::text('last_name_user', $admin->last_name_user, ['class' => 'form-control' .
        ($errors->has('last_name_user') ? ' is-invalid' : ''), 'placeholder' => 'Last Name User']) }}
        {!! $errors->first('last_name_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">admin <b>last_name_user</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('type_identification_user') }}</label>
    <div>
        {{ Form::text('type_identification_user', $admin->type_identification_user, ['class' => 'form-control' .
        ($errors->has('type_identification_user') ? ' is-invalid' : ''), 'placeholder' => 'Type Identification User']) }}
        {!! $errors->first('type_identification_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">admin <b>type_identification_user</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('number_identification_user') }}</label>
    <div>
        {{ Form::text('number_identification_user', $admin->number_identification_user, ['class' => 'form-control' .
        ($errors->has('number_identification_user') ? ' is-invalid' : ''), 'placeholder' => 'Number Identification User']) }}
        {!! $errors->first('number_identification_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">admin <b>number_identification_user</b> instruction.</small>
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">Contact:</label>
    <div>
        {{ Form::text('email_con', $admin->contacts->email ?? '', ['class' => 'form-control' .
        ($errors->has('email_con') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email_con', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Admin contact instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Telephone:</label>
    <div>
        {{ Form::text('telephone_con', $admin->contacts->telephone ?? '', ['class' => 'form-control' .
        ($errors->has('telephone_con') ? ' is-invalid' : ''), 'placeholder' => 'Telephone']) }}
        {!! $errors->first('telephone_con', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Admin telephone instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Address:</label>
    <div>
        {{ Form::text('addres_add', $admin->address->addres ?? '', ['class' => 'form-control' .
        ($errors->has('addres_add') ? ' is-invalid' : ''), 'placeholder' => 'Addres_add']) }}
        {!! $errors->first('addres_add', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Admin address instruction.</small>
    </div>
    <div>
        {{ Form::text('state_user', $admin->state_user, ['class' => 'form-control' .
        ($errors->has('state_user') ? ' is-invalid' : ''), 'placeholder' => 'state_user']) }}
        {!! $errors->first('state_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">admin <b>estado</b> instruction.</small>
    </div>
    
</div>
    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
