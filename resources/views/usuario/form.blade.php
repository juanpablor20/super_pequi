
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombres') }}</label>
    <div>
        {{ Form::text('nombres', $usuario->nombres, ['class' => 'form-control' .
        ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
        {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usuario <b>nombres</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('apellidos') }}</label>
    <div>
        {{ Form::text('apellidos', $usuario->apellidos, ['class' => 'form-control' .
        ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
        {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usuario <b>apellidos</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo_doc') }}</label>
    <div>
        {{ Form::text('tipo_doc', $usuario->tipo_doc, ['class' => 'form-control' .
        ($errors->has('tipo_doc') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Doc']) }}
        {!! $errors->first('tipo_doc', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usuario <b>tipo_doc</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('num_doc') }}</label>
    <div>
        {{ Form::text('num_doc', $usuario->num_doc, ['class' => 'form-control' .
        ($errors->has('num_doc') ? ' is-invalid' : ''), 'placeholder' => 'Num Doc']) }}
        {!! $errors->first('num_doc', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usuario <b>num_doc</b> instruction.</small>
    </div>
</div>


<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('correo') }}</label>
    <div>
        {{ Form::text('correo', $usuario->correo, ['class' => 'form-control' .
        ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
        {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usuario <b>Correo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('telefono') }}</label>
    <div>
        {{ Form::text('telefono', $usuario->telefono, ['class' => 'form-control' .
        ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usuario <b>Numero de telefono</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('ciudad') }}</label>
    <div>
        {{ Form::text('ciudad', $usuario->ciudad, ['class' => 'form-control' .
        ($errors->has('ciudad') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
        {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">usuario <b>cudad</b> instruction.</small>
    </div>
</div>


<!-- Otras entradas de formulario para otros campos de usuario -->

<div class="form-group mb-3">
    <label class="form-label">Rol</label>
    <div>
        <select class="form-select" name="roles_id">
            <option value="1" {{ $usuario->roll_id == 1 ? 'selected' : '' }}>Aprendiz</option>
            <option value="2" {{ $usuario->roll_id == 2 ? 'selected' : '' }}>Instructor</option>
        </select>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Programas</label>
</div>
<select class="form-select" name="programa_id">
    @foreach ($programas as $programa)
    <option value="{{$programa->id}}">{{$programa->nom_pro}}</option>
    @endforeach
</select>

<div class="form-group mb-3">
    <label class="form-label">Fichas </label>
    <div>
        <select class="form-select" name="ficha_id">
            @foreach ($fichas as $ficha)
            <option value="{{$ficha->id}}">{{ $ficha->num_ficha }}</option>
        @endforeach
        </select>
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
