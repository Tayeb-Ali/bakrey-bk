<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('models/users.plural')</span></a>
</li>

<li class="{{ Request::is('propertyCategories*') ? 'active' : '' }}">
    <a href="{{ route('propertyCategories.index') }}"><i
                class="fa fa-edit"></i><span>@lang('models/propertyCategories.plural')</span></a>
</li>

<li class="{{ Request::is('properties*') ? 'active' : '' }}">
    <a href="{{ route('properties.index') }}"><i
                class="fa fa-edit"></i><span>@lang('models/properties.plural')</span></a>
</li>

<li class="{{ Request::is('images*') ? 'active' : '' }}">
    <a href="{{ route('images.index') }}"><i class="fa fa-edit"></i><span>@lang('models/images.plural')</span></a>
</li>
<li class="{{ Request::is('sliders*') ? 'active' : '' }}">
    <a href="{{ route('sliders.index') }}"><i class="fa fa-edit"></i><span>@lang('models/sliders.plural')</span></a>
</li>

<li class="{{ Request::is('conditions*') ? 'active' : '' }}">
    <a href="{{ route('conditions.index') }}"><i
                class="fa fa-edit"></i><span>@lang('models/conditions.plural')</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{{ route('cities.index') }}"><i class="fa fa-edit"></i><span>@lang('models/cities.plural')</span></a>
</li>

<li class="{{ Request::is('districts*') ? 'active' : '' }}">
    <a href="{{ route('districts.index') }}"><i class="fa fa-edit"></i><span>@lang('models/districts.plural')</span></a>
</li>
<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.index') }}"><i class="fa fa-edit"></i><span>@lang('models/settings.plural')</span></a>
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

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('models/users.plural')</span></a>
</li>

