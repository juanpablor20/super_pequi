
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nom_pro') }}</label>
    <div>
        {{ Form::text('nom_pro', $programa->nom_pro, ['class' => 'form-control' .
        ($errors->has('nom_pro') ? ' is-invalid' : ''), 'placeholder' => 'Nom Pro']) }}
        {!! $errors->first('nom_pro', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">programa <b>nom_pro</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('estados') }}</label>
    <div>
        {{ Form::text('estados', $programa->estados, ['class' => 'form-control' .
        ($errors->has('estados') ? ' is-invalid' : ''), 'placeholder' => 'Estados']) }}
        {!! $errors->first('estados', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">programa <b>estados</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Número de Ficha</label>
    <div>
        {{ Form::text('num_ficha', $programa->num_ficha, ['class' => 'form-control' . ($errors->has('num_ficha') ? ' is-invalid' : ''), 'placeholder' => 'Número de Ficha']) }}
        {!! $errors->first('num_ficha', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">Instrucción para el número de ficha.</small>
    </div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
