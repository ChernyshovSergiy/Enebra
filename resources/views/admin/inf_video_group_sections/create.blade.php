@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_video_group_section')
        <small>@lang('admin.it_add_video_group_section_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('inf_video_group_sections.index')}}"><i class="fas fa-file-audio"></i> @lang('admin.listing_video_group_sections')</a></li>
        <li class="active">@lang('admin.add_video_group_section')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'inf_video_group_sections.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_video_group_section')</h3>
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
                    <div class="form-group">
                        <label>@lang('column.video_group')</label>
                        {{ Form::select('video_group_id',
                            $video_group,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('inf_video_group_sections.index')}}" class="btn btn-default">@lang('button.back')</a>
                <button class="btn btn-success pull-right">@lang('button.add')</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{ Form::close() }}
    </section>
    <!-- /.content -->
@endsection