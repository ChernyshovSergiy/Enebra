@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.create_new_image_category')
        <small>@lang('admin.new_image_category')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('image_categories.index')}}"><i class="fas fa-list-alt"></i>@lang('admin.image_categories')</a></li>
        <li class="active">@lang('admin.create_new_image_category')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            {!! Form::open(['route' => 'image_categories.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.create_new_image_category')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.name')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('image_categories.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-success pull-right">@lang('button.add')</button>
                </div>
            <!-- /.box-footer-->
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection