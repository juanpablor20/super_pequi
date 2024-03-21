
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre') }}</label>
    <div>
        {{ Form::text('nombre', $computo->nombre, ['class' => 'form-control' .
        ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">computo <b>nombre</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('numero_serie') }}</label>
    <div>
        {{ Form::text('numero_serie', $computo->numero_serie, ['class' => 'form-control' .
        ($errors->has('numero_serie') ? ' is-invalid' : ''), 'placeholder' => 'Numero Serie']) }}
        {!! $errors->first('numero_serie', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">computo <b>numero_serie</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('caracteristicas') }}</label>
    <div>
        {{ Form::text('caracteristicas', $computo->caracteristicas, ['class' => 'form-control' .
        ($errors->has('caracteristicas') ? ' is-invalid' : ''), 'placeholder' => 'Caracteristicas']) }}
        {!! $errors->first('caracteristicas', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">computo <b>caracteristicas</b> instruction.</small>
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
