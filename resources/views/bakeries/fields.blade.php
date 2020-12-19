<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/bakeries.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/bakeries.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/bakeries.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/bakeries.fields.status').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Reason Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('reason', __('models/bakeries.fields.reason').':') !!}
    {!! Form::textarea('reason', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/bakeries.fields.type').':') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Report By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('report_by', __('models/bakeries.fields.report_by').':') !!}
    {!! Form::number('report_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bakeries.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
