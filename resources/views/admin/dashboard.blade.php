@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        @lang('admin.dashboard_main')
        <small>@lang('admin.dashboard')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.dashboard')</li>
    </ol>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop