<!-- Request On Field -->
<div class="form-group">
    {!! Form::label('request_on', __('models/orders.fields.request_on').':') !!}
    <p>{{ $order->request_on }}</p>
</div>

<!-- Arrival On Field -->
<div class="form-group">
    {!! Form::label('arrival_on', __('models/orders.fields.arrival_on').':') !!}
    <p>{{ $order->arrival_on }}</p>
</div>

<!-- Quota Field -->
<div class="form-group">
    {!! Form::label('quota', __('models/orders.fields.quota').':') !!}
    <p>{{ $order->quota }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/orders.fields.status').':') !!}
    <p>{{ $order->status }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/orders.fields.user_id').':') !!}
    <p>{{ $order->user_id }}</p>
</div>

<!-- Agency Id Field -->
<div class="form-group">
    {!! Form::label('agency_id', __('models/orders.fields.agency_id').':') !!}
    <p>{{ $order->agency_id }}</p>
</div>

<!-- Size Field -->
<div class="form-group">
    {!! Form::label('size', __('models/orders.fields.size').':') !!}
    <p>{{ $order->size }}</p>
</div>

<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', __('models/orders.fields.qty').':') !!}
    <p>{{ $order->qty }}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', __('models/orders.fields.total').':') !!}
    <p>{{ $order->total }}</p>
</div>

<!-- Driver Id Field -->
<div class="form-group">
    {!! Form::label('driver_id', __('models/orders.fields.driver_id').':') !!}
    <p>{{ $order->driver_id }}</p>
</div>

<!-- Subtotal Field -->
<div class="form-group">
    {!! Form::label('subtotal', __('models/orders.fields.subtotal').':') !!}
    <p>{{ $order->subtotal }}</p>
</div>

<!-- Delivery Fees Field -->
<div class="form-group">
    {!! Form::label('delivery_fees', __('models/orders.fields.delivery_fees').':') !!}
    <p>{{ $order->delivery_fees }}</p>
</div>

