@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_term')
        <small>@lang('admin.it_add_term_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('terms.index')}}"><i class="fas fa-file-alt"></i> @lang('admin.listing_terms')</a></li>
        <li class="active">@lang('admin.add_term')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'terms.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_term')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    @foreach($text_blocks as $block)
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                <textarea name="{{ $block.':'.$language}}" id="{{ $block.':'.$language}}" cols="80" rows="10" class="form-control" title="{{ $block.':'.$language}}">{{old( $block.':'.$language)}}</textarea>
                            </div>
                        @endforeach
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.views_count')</label>
                        <input type="text" name="views_count" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('views_count') }}">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('terms.index')}}" class="btn btn-default">@lang('button.back')</a>
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