
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Nombre del Ambiente') }}</label>
    <div>
        {{ Form::text('names', $environment->names, ['class' => 'form-control' .
        ($errors->has('names') ? ' is-invalid' : ''), 'placeholder' => 'Ejemplo, ambiente 9']) }}
        {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
        
    </div>
</div>



    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{route('environments.index')}}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
