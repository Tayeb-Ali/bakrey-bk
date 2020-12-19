<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('models/users.plural')</span></a>
</li>

<li class="{{ Request::is('bakeries*') ? 'active' : '' }}">
    <a href="{{ route('bakeries.index') }}"><i class="fa fa-edit"></i><span>@lang('models/bakeries.plural')</span></a>
</li>

<li class="{{ Request::is('drivers*') ? 'active' : '' }}">
    <a href="{{ route('drivers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/drivers.plural')</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><i class="fa fa-edit"></i><span>@lang('models/orders.plural')</span></a>
</li>
