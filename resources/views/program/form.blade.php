
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre del programa') }}</label>
    <div>
        {{ Form::text('names_pro', $program->names_pro, ['class' => 'form-control' .
        ($errors->has('names_pro') ? ' is-invalid' : ''), 'placeholder' => 'ejemplo, analisis y desarrollo de sofware']) }}
        {!! $errors->first('names_pro', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('codigo del programa') }}</label>
    <div>
        {{ Form::text('code_pro', $program->code_pro, ['class' => 'form-control' .
        ($errors->has('code_pro') ? ' is-invalid' : ''), 'placeholder' => 'ejemplo, 262086']) }}
        {!! $errors->first('code_pro', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('version') }}</label>
    <div>
        {{ Form::text('version', $program->version, ['class' => 'form-control' .
        ($errors->has('version') ? ' is-invalid' : ''), 'placeholder' => 'ejemplo, Version face 2']) }}
        {!! $errors->first('version', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('estado') }}</label>
    <div>
        {{ Form::text('states', $program->states, ['class' => 'form-control' .
        ($errors->has('states') ? ' is-invalid' : ''), 'placeholder' => 'ejemplo, activo']) }}
        {!! $errors->first('states', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{route('programs.index')}}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
