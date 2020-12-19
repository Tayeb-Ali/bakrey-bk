<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/drivers.fields.name').':') !!}
    <p>{{ $driver->name }}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', __('models/drivers.fields.number').':') !!}
    <p>{{ $driver->number }}</p>
</div>

