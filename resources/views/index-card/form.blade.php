
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Numero de la Ficha') }}</label>
    <div>
        {{ Form::text('number', $indexCard->number, ['class' => 'form-control' .
        ($errors->has('number') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el número de ficha']) }}
        {!! $errors->first('number', '<div class="invalid-feedback">:message</div>') !!}
       
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{form::label('Programa')}}</label>
   
<x-tom-select remote-data="true" name="program_id" item-search-route="programa.search"></x-tom-select>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{route('indexcards.index')}}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
