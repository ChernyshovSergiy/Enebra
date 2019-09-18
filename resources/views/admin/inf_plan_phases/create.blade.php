@extends('adminlte::page')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.add_plan_phase')
                <small>@lang('admin.the_add_plan_phase_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_plan_phases.index')}}"><i class="fa fa-qrcode"></i> @lang('admin.listing_plan_phases')</a></li>
                <li class="active">@lang('admin.add_plan_phase')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'inf_plan_phases.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_plan_phase')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.object_name'): {{$language}}</label>
                                <input type="text" name="{{'title'.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title'.':'.$language) }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_plan_phases.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-success pull-right">@lang('button.add')</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection