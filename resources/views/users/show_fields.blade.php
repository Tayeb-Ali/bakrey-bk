<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Mobile Field -->
<div class="form-group">
    {!! Form::label('mobile', __('models/users.fields.mobile').':') !!}
    <p>{{ $user->mobile }}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    <p>{{ $user->role }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/users.fields.status').':') !!}
    <p>{{ $user->status }}</p>
</div>

<!-- Areas Field -->
<div class="form-group">
    {!! Form::label('areas', __('models/users.fields.areas').':') !!}
    <p>{{ $user->areas }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Api Token Field -->
<div class="form-group">
    {!! Form::label('api_token', __('models/users.fields.api_token').':') !!}
    <p>{{ $user->api_token }}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', __('models/users.fields.remember_token').':') !!}
    <p>{{ $user->remember_token }}</p>
</div>

