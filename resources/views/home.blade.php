@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    {{--    <div class="content-wrapper">--}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-reorder"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Orders</span>
                        <span class="info-box-number">@if(isset($orders)){{$orders}}@endif<small> #</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-male"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Agency</span>
                        <span class="info-box-number">@if(isset($agent)){{$agent}}@endif</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bakery</span>
                        <span class="info-box-number">@if(isset($bakery)){{$bakery}}@endif</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-truck"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Drivers</span>
                        <span class="info-box-number">@if(isset($driver)){{$driver}}@endif</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    {{--    </div>--}}



@endsection

{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}

{{--<p>jjj</p>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
