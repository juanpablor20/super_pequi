<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('description') }}</label>
    <div>

        {{ Form::textArea('description', $disability->description, [
            'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),
            'placeholder' => 'Description',
        ]) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        
    </div>
</div>
<input type="hidden" name="service_id" value="{{ $serviceId }}">

<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('status') }}</label>
    <div>
        {{ Form::text('status', $disability->status, [
            'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''),
            'placeholder' => 'Status',
        ]) }}
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">disability <b>status</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('punishment_date') }}</label>
    <div>
        <x-lite-picker name="punishment_date"></x-lite-picker>

    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('end_date') }}</label>
    <div>

        <x-flat-picker name="end_date"></x-flat-picker>

        {{-- {{ Form::text('end_date', $disability->end_date, ['class' => 'form-control' .
        ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
        {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">disability <b>end_date</b> instruction.</small> --}}
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
