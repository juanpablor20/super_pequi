
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_prestamo') }}</label>
    <div>
        {{ Form::text('fecha_prestamo', $servicio->fecha_prestamo, ['class' => 'form-control' .
        ($errors->has('fecha_prestamo') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Prestamo']) }}
        {!! $errors->first('fecha_prestamo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">servicio <b>fecha_prestamo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_devolucion') }}</label>
    <div>
        {{ Form::text('fecha_devolucion', $servicio->fecha_devolucion, ['class' => 'form-control' .
        ($errors->has('fecha_devolucion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Devolucion']) }}
        {!! $errors->first('fecha_devolucion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">servicio <b>fecha_devolucion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('estados') }}</label>
    <div>
        {{ Form::text('estados', $servicio->estados, ['class' => 'form-control' .
        ($errors->has('estados') ? ' is-invalid' : ''), 'placeholder' => 'Estados']) }}
        {!! $errors->first('estados', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">servicio <b>estados</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('user_id') }}</label>
    <div>
        {{ Form::text('user_id', $servicio->user_id, ['class' => 'form-control' .
        ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">servicio <b>user_id</b> instruction.</small>
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
