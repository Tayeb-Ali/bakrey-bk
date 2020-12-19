<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/bakeries.fields.name').':') !!}
    <p>{{ $bakery->name }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/bakeries.fields.user_id').':') !!}
    <p>{{ $bakery->user_id }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/bakeries.fields.address').':') !!}
    <p>{{ $bakery->address }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/bakeries.fields.status').':') !!}
    <p>{{ $bakery->status }}</p>
</div>

<!-- Reason Field -->
<div class="form-group">
    {!! Form::label('reason', __('models/bakeries.fields.reason').':') !!}
    <p>{{ $bakery->reason }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('models/bakeries.fields.type').':') !!}
    <p>{{ $bakery->type }}</p>
</div>

<!-- Report By Field -->
<div class="form-group">
    {!! Form::label('report_by', __('models/bakeries.fields.report_by').':') !!}
    <p>{{ $bakery->report_by }}</p>
</div>

