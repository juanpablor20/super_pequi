
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('return_date') }}</label>
    <div>
        {{ Form::text('return_date', $service->return_date, ['class' => 'form-control' .
        ($errors->has('return_date') ? ' is-invalid' : ''), 'placeholder' => 'Return Date']) }}
        {!! $errors->first('return_date', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">service <b>return_date</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('date_ser') }}</label>
    <div>
        {{ Form::text('date_ser', $service->date_ser, ['class' => 'form-control' .
        ($errors->has('date_ser') ? ' is-invalid' : ''), 'placeholder' => 'Date Ser']) }}
        {!! $errors->first('date_ser', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">service <b>date_ser</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('state_ser') }}</label>
    <div>
        {{ Form::text('state_ser', $service->state_ser, ['class' => 'form-control' .
        ($errors->has('state_ser') ? ' is-invalid' : ''), 'placeholder' => 'State Ser']) }}
        {!! $errors->first('state_ser', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">service <b>state_ser</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('user_id') }}</label>
    <div>
        {{ Form::text('user_id', $service->user_id, ['class' => 'form-control' .
        ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">service <b>user_id</b> instruction.</small>
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
