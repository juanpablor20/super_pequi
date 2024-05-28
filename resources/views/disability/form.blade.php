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
    <label class="form-label"> {{ Form::label('end_date') }}</label>
    <div>

        <x-flat-picker name="end_date"></x-flat-picker>

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
