
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('number') }}</label>
    <div>
        {{ Form::text('number', $indexCard->number, ['class' => 'form-control' .
        ($errors->has('number') ? ' is-invalid' : ''), 'placeholder' => 'Number']) }}
        {!! $errors->first('number', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">indexCard <b>number</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('states') }}</label>
    <div>
        {{ Form::text('states', $indexCard->states, ['class' => 'form-control' .
        ($errors->has('states') ? ' is-invalid' : ''), 'placeholder' => 'States']) }}
        {!! $errors->first('states', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">indexCard <b>states</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('program_id') }}</label>
    <div>
        {{ Form::text('program_id', $indexCard->program_id, ['class' => 'form-control' .
        ($errors->has('program_id') ? ' is-invalid' : ''), 'placeholder' => 'Program Id']) }}
        {!! $errors->first('program_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">indexCard <b>program_id</b> instruction.</small>
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
