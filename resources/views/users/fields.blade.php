<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', __('models/users.fields.mobile').':') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    <select id="role" name="role" class="form-control control" data-role="control">
        <option value="1" @if(isset($user)){{$user->role == 1 ? 'selected' : '' }}@endif>Admin</option>
        <option value="2" @if(isset($user)){{$user->role ==2 ? 'selected' : '' }}@endif>Agent</option>
        <option value="3" @if(isset($user)){{$user->role ==3 ? 'selected' : '' }}@endif>Bakery</option>
    </select>
    {!! $errors->first('role', '<span class="control-error">:message</span>') !!}
</div>

<!-- Status Field -->

<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/users.fields.status').':') !!}
    <select id="status" name="status" class="form-control control" data-role="control">
        <option value="1" @if(isset($user)){{$user->status == 1 ? 'selected' : '' }}@endif>Active</option>
        <option value="2" @if(isset($user)){{$user->status ==2 ? 'selected' : '' }}@endif>InActive</option>
    </select>
    {!! $errors->first('status', '<span class="control-error">:message</span>') !!}
</div>

<!-- Areas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('areas', __('models/users.fields.areas').':') !!}
    {!! Form::text('areas', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
