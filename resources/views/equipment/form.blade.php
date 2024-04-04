<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('type_equi', 'Type Equi') }}</label>
    <div>
        {{ Form::text('type_equi', $equipment->type_equi, [
            'class' => 'form-control' . ($errors->has('type_equi') ? ' is-invalid' : ''),
            'placeholder' => 'tipo de equipo',
        ]) }}
        {!! $errors->first('type_equi', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('characteristics') }}</label>
    <div>
        {{ Form::text('characteristics', $equipment->characteristics, [
            'class' => 'form-control' . ($errors->has('characteristics') ? ' is-invalid' : ''),
            'placeholder' => 'caracteristicas',
        ]) }}
        {!! $errors->first('serie_equi', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">equipos <b>Numero de</b> Serie.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('serie_equipo') }}</label>
    <div>
        {{ Form::text('serie_equi', $equipment->serie_equi, [
            'class' => 'form-control' . ($errors->has('serie_equi') ? ' is-invalid' : ''),
            'placeholder' => 'Numero de serie',
        ]) }}
        {!! $errors->first('serie_equi', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">equipos <b>Numero de</b> Serie.</small>
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
