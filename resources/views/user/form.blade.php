<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('names') }}</label>
    <div>
        {{ Form::text('names', $user->names, [
            'class' => 'form-control' . ($errors->has('names') ? ' is-invalid' : ''),
            'placeholder' => 'Names',
        ]) }}
        {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>names</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('last_name') }}</label>
    <div>
        {{ Form::text('last_name', $user->last_name, [
            'class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''),
            'placeholder' => 'Last Name',
        ]) }}
        {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>last_name</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('type_identification') }}</label>
    <div>
        {{ Form::text('type_identification', $user->type_identification, [
            'class' => 'form-control' . ($errors->has('type_identification') ? ' is-invalid' : ''),
            'placeholder' => 'Type Identification',
        ]) }}
        {!! $errors->first('type_identification', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>type_identification</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('number_identification') }}</label>
    <div>
        {{ Form::text('number_identification', $user->number_identification, [
            'class' => 'form-control' . ($errors->has('number_identification') ? ' is-invalid' : ''),
            'placeholder' => 'Number Identification',
        ]) }}
        {!! $errors->first('number_identification', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>number_identification</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('sex_user') }}</label>
    <div>
        {{ Form::text('sex_user', $user->sex_user, [
            'class' => 'form-control' . ($errors->has('sex_user') ? ' is-invalid' : ''),
            'placeholder' => 'Sex User',
        ]) }}
        {!! $errors->first('sex_user', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>sex_user</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('gender_sex') }}</label>
    <div>
        {{ Form::text('gender_sex', $user->gender_sex, [
            'class' => 'form-control' . ($errors->has('gender_sex') ? ' is-invalid' : ''),
            'placeholder' => 'Gender Sex',
        ]) }}
        {!! $errors->first('gender_sex', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>gender_sex</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Contact:</label>
    <div>
        {{ Form::text('email_con', $contact->email_con ?? '', [
            'class' => 'form-control' . ($errors->has('email_con') ? ' is-invalid' : ''),
            'placeholder' => 'Email',
        ]) }}
        {!! $errors->first('email_con', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Admin contact instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Telephone:</label>
    <div>
        {{ Form::text('telephone_con', $user->contacts->telephone_con ?? '', [
            'class' => 'form-control' . ($errors->has('telephone_con') ? ' is-invalid' : ''),
            'placeholder' => 'Telephone',
        ]) }}
        {!! $errors->first('telephone_con', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Admin telephone instruction.</small>
    </div>




</div>
<div class="form-group mb-3">
    <label class="form-label">Address:</label>
    <div>
        {{ Form::text('addres_add', $user->address->addres_add ?? '', [
            'class' => 'form-control' . ($errors->has('addres_add') ? ' is-invalid' : ''),
            'placeholder' => 'Addres_add',
        ]) }}
        {!! $errors->first('addres_add', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Admin address instruction.</small>
    </div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
