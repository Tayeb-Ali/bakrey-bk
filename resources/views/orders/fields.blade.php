<!-- Request On Field -->
<div class="form-group col-sm-6">
    {!! Form::label('request_on', __('models/orders.fields.request_on').':') !!}
    {!! Form::date('request_on', null, ['class' => 'form-control','id'=>'request_on']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#request_on').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Arrival On Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrival_on', __('models/orders.fields.arrival_on').':') !!}
    {!! Form::date('arrival_on', null, ['class' => 'form-control','id'=>'arrival_on']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#arrival_on').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Quota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quota', __('models/orders.fields.quota').':') !!}
    {!! Form::number('quota', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/orders.fields.status').':') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/orders.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Agency Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agency_id', __('models/orders.fields.agency_id').':') !!}
    {!! Form::number('agency_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', __('models/orders.fields.size').':') !!}
    {!! Form::number('size', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', __('models/orders.fields.qty').':') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', __('models/orders.fields.total').':') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Driver Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driver_id', __('models/orders.fields.driver_id').':') !!}
    {!! Form::number('driver_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', __('models/orders.fields.subtotal').':') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_fees', __('models/orders.fields.delivery_fees').':') !!}
    {!! Form::number('delivery_fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orders.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
