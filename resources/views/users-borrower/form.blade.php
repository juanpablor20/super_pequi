
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('name_user') }}</label>
    <div>
        {{ Form::text('name_user', $usersBorrower->name_user, ['class' => 'form-control' .
        ($errors->has('name_user') ? ' is-invalid' : ''), 'placeholder' => 'Name User']) }}
        {!! $errors->first('name_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usersBorrower <b>name_user</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('last_name_user') }}</label>
    <div>
        {{ Form::text('last_name_user', $usersBorrower->last_name_user, ['class' => 'form-control' .
        ($errors->has('last_name_user') ? ' is-invalid' : ''), 'placeholder' => 'Last Name User']) }}
        {!! $errors->first('last_name_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usersBorrower <b>last_name_user</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('type_identification_user') }}</label>
    <div>
        {{ Form::text('type_identification_user', $usersBorrower->type_identification_user, ['class' => 'form-control' .
        ($errors->has('type_identification_user') ? ' is-invalid' : ''), 'placeholder' => 'Type Identification User']) }}
        {!! $errors->first('type_identification_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usersBorrower <b>type_identification_user</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('number_identification_user') }}</label>
    <div>
        {{ Form::text('number_identification_user', $usersBorrower->number_identification_user, ['class' => 'form-control' .
        ($errors->has('number_identification_user') ? ' is-invalid' : ''), 'placeholder' => 'Number Identification User']) }}
        {!! $errors->first('number_identification_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usersBorrower <b>number_identification_user</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('state_user') }}</label>
    <div>
        {{ Form::text('state_user', $usersBorrower->state_user, ['class' => 'form-control' .
        ($errors->has('state_user') ? ' is-invalid' : ''), 'placeholder' => 'State User']) }}
        {!! $errors->first('state_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usersBorrower <b>state_user</b> instruction.</small>
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
