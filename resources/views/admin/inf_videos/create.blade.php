@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_video')
        <small>@lang('admin.it_add_video_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('inf_videos.index')}}"><i class="fab fa-youtube"></i> @lang('admin.listing_videos')</a></li>
        <li class="active">@lang('admin.add_video')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'inf_videos.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_video')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    @foreach($text_blocks as $block)
                        @foreach($languages as $language)
                            @if($block === 'image_id')
                                <div class="form-group">
                                    <label>@lang('column.image'): {{$language}}</label>
                                    {{ Form::select($block.':'.$language,
                                        $images,
                                        null,
                                        ['class' => 'form-control select2'])
                                    }}
                                </div>
                            @elseif( $block === 'description' xor $block === 'about_author')
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                    <textarea name="{{ $block.':'.$language}}" id="{{ $block.':'.$language}}" cols="80" rows="10" class="form-control" title="{{ $block.':'.$language}}">{{old( $block.':'.$language)}}</textarea>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                    <input type="text" name="{{ $block.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old( $block.':'.$language)}}">
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    <div class="form-group">
                        <label>@lang('column.video_group')</label>
                        {{ Form::select('video_group_id',
                            $video_groups,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                    <div class="form-group">
                        <label>@lang('column.section')</label>
                        {{ Form::select('video_group_section_id',
                            $video_group_sections,
                            null,
                            ['class' => 'form-control select2',
                            'placeholder' => Lang::get('admin.select_section')])
                        }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.sort')</label>
                        <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('sort') }}">
                        <p class="help-block">@lang('admin.introduction_sort_format')</p>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('inf_videos.index')}}" class="btn btn-default">@lang('button.back')</a>
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