@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.edit_des_block')
        <small>@lang('admin.it_edit_des_block_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('desc_blocks.index')}}"><i class="fas fa-th-large"></i> @lang('admin.listing_des_blocks')</a></li>
        <li class="active">@lang('admin.edit_des_block')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => ['desc_blocks.update', $block->id], 'method'=>'put']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.edit_des_block')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.object_name')</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $block->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.page')</label>
                        {{ Form::select('menu_id',
                            $page_names,
                            $block->menu_id,
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.sort')</label>
                        <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $block->sort }}">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('desc_blocks.index')}}" class="btn btn-default">@lang('button.back')</a>
                <button class="btn btn-warning pull-right">@lang('button.edit')</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{ Form::close() }}
    </section>
    <!-- /.content -->
@endsection