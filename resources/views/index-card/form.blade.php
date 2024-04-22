
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Numero de la Ficha') }}</label>
    <div>
        {{ Form::text('number', $indexCard->number, ['class' => 'form-control' .
        ($errors->has('number') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el número de ficha']) }}
        {!! $errors->first('number', '<div class="invalid-feedback">:message</div>') !!}
       
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Estado') }}</label>
    <div>
        {{ Form::text('states', $indexCard->states, ['class' => 'form-control' .
        ($errors->has('states') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el estado de la ficha  ']) }}
        {!! $errors->first('states', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">En caso de <b>un registro antisipado</b> se recomienda inactivarla.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{form::label('Programa')}}</label>
    <select class="form-control" id="programa" name="program_id">
        <option value="">Vincula la ficha con el programa al que pertenecerá</option>
        @foreach($programas as $programa)
            <option value="{{ $programa->id }}">{{ $programa->names_pro }}</option>
        @endforeach
    </select>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{route('indexcards.index')}}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
