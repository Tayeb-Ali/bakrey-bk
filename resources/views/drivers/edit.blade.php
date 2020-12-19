@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/drivers.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($driver, ['route' => ['drivers.update', $driver->id], 'method' => 'patch']) !!}

                        @include('drivers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
