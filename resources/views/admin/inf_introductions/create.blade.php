@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_introduction')
        <small>@lang('admin.it_add_introduction_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('introductions.index')}}"><i class="far fa-list-alt"></i> @lang('admin.listing_introduction')</a></li>
        <li class="active">@lang('admin.add_introduction')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'introductions.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_introduction')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.title')</label>
                        {{ Form::select('title_id',
                         $titles,
                         null,
                         ['class' => 'form-control select2'])
                        }}
                        <p class="help-block">@lang('admin.introduction_format')</p>
                    </div>
                    @foreach($text_blocks as $block)
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                <textarea name="{{ $block.':'.$language}}" id="{{ $block.':'.$language}}" cols="80" rows="10" class="form-control" title="{{ $block.':'.$language}}">{{old( $block.':'.$language)}}</textarea>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('introductions.index')}}" class="btn btn-default">@lang('button.back')</a>
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