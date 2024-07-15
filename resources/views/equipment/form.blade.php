<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('type_equi', 'Tipo de Articulo') }}</label>
    <div>
        {{ Form::text('type_equi', $equipment->type_equi, [
            'class' => 'form-control' . ($errors->has('type_equi') ? ' is-invalid' : ''),
            'placeholder' => 'Ejemplo: portatil, audifonos, teclado', 'required'
        ]) }}
        {!! $errors->first('type_equi', '<div class="invalid-feedback">:message</div>') !!}
    </div>

</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('caracteristicas') }}</label>
    <div>
        {{ Form::text('characteristics', $equipment->characteristics, [
            'class' => 'form-control' . ($errors->has('characteristics') ? ' is-invalid' : ''),
            'placeholder' => 'Ejemplo: lenovo gaming, audifonos inalambricos', 'required'
        ]) }}
        {!! $errors->first('serie_equi', '<div class="invalid-feedback">:message</div>') !!}
       
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('Numero de serie del Articulo') }}</label>
    <div>
        {{ Form::text('serie_equi', $equipment->serie_equi, [
            'class' => 'form-control' . ($errors->has('serie_equi') ? ' is-invalid' : ''),
            'placeholder' => 'Numero de serie', 'required'
        ]) }}
        {!! $errors->first('serie_equi', '<div class="invalid-feedback">:message</div>') !!}
        
    </div>
</div>


<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('equipment.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
        </div>
    </div>
</div>
