@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_image')
        <small>@lang('admin.it_add_image_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('images.index')}}"><i class="fas fa-image"></i> @lang('admin.listing_images')</a></li>
        <li class="active">@lang('admin.add_image')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'images.store', 'files' => true]) }}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_image')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.name')</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label>@lang('column.category')</label>
                        {{ Form::select('category_id',
                            $image_categories,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>

                    <div class="form-group">
                        <label>@lang('column.author')</label>
                        {{ Form::select('user_id',
                            $users,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">@lang('column.image')</label>
                        <input type="file" name="image" id="exampleInputFile">

                        <p class="help-block">@lang('admin.image_format')
                            <br>@lang('admin.warning_svg')<br>
                            {{ "<".'?xml version="1.0" encoding="UTF-8" standalone="no"?'.">" }}
                        </p>
                    </div>
                </div>
            </div>
             <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('images.index')}}" class="btn btn-default">@lang('button.back')</a>
                <button class="btn btn-success pull-right">@lang('button.add')</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    {{ Form::close() }}
    </section>
    <!-- /.content -->
@endsection