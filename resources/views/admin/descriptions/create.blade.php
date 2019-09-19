@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_text_block')
        <small>@lang('admin.it_add_text_block_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('descriptions.index')}}"><i class="fas fa-bars"></i> @lang('admin.listing_blocks')</a></li>
        <li class="active">@lang('admin.add_text_block')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'descriptions.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_text_block')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.page')</label>
                        {{ Form::select('desc_block_id',
                            $desc_blocks,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                    @foreach($text_blocks as $block)
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                <textarea name="{{ $block.':'.$language}}" id="{{ $block.':'.$language}}" cols="80" rows="10" class="form-control" title="{{ $block.':'.$language}}">{{old( $block.':'.$language)}}</textarea>
                            </div>
                        @endforeach
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.bg_image_id')</label>
                        {{ Form::select('image_id',
                            $images,
                            null,
                            ['class' => 'form-control select2',
                            'placeholder' => Lang::get('admin.select_image')])
                        }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.shadow_bg')</label>
                        <input type="text" name="shadow" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('shadow') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.in_image_id_1')</label>
                        {{ Form::select('in_image_id_1',
                            $images,
                            null,
                            ['class' => 'form-control select2',
                            'placeholder' => Lang::get('admin.select_image')])
                        }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.in_image_id_2')</label>
                        {{ Form::select('in_image_id_2',
                            $images,
                            null,
                            ['class' => 'form-control select2',
                            'placeholder' => Lang::get('admin.select_image')])
                        }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.sort')</label>
                        <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('sort') }}">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('descriptions.index')}}" class="btn btn-default">@lang('button.back')</a>
                <button class="btn btn-success pull-right">@lang('button.add')</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{ Form::close() }}
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replaceAll();
        })
    </script>
@stop