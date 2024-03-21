
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('num_serie') }}</label>
    <div>
        {{ Form::text('num_serie', $equipo->num_serie, ['class' => 'form-control' .
        ($errors->has('num_serie') ? ' is-invalid' : ''), 'placeholder' => 'Num Serie']) }}
        {!! $errors->first('num_serie', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">equipo <b>num_serie</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $equipo->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">equipo <b>descripcion</b> instruction.</small>
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
