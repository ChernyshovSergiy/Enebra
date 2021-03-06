@extends('adminlte::page')

@section('title', 'Video Groups')

@section('content_header')
    <h1>
        @lang('admin.listing_video_groups')
        <small>@lang('admin.it_all_video_groups_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.listing_video_groups')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
    'route' => 'inf_video_groups.store'
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.listing_video_groups')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('inf_video_groups.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>@lang('column.id')</th>
                        <th>@lang('column.object_name')</th>
                        <th>@lang('column.description')</th>
                        <th>@lang('column.keywords')</th>
                        <th>@lang('column.meta_desc')</th>
                        <th>@lang('column.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($video_groups as $video_group)
                        <tr>
                            <td>{{ $video_group->id }}</td>
                            <td>{{ $video_group->getTitle() }}</td>
                            <td>{!! $video_group->content ? $video_group->content->description->$locale : '' !!}</td>
                            <td>{!! $video_group->content ? $video_group->content->keywords->$locale : '' !!}</td>
                            <td>{!! $video_group->content ? $video_group->content->meta_desc->$locale : '' !!}</td>
                            <td>
                                {{--<a href="{{route('inf_video_groups.show', $video_group->id)}}" class="fa fa-eye"></a>--}}
                                <a href="{{route('inf_video_groups.edit', $video_group->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                <span style="float:left;">&emsp;or&emsp;</span>
                                {{ Form::open(['route'=>['inf_video_groups.destroy', $video_group->id], 'method'=>'delete']) }}
                                <a onclick="return confirm('are you sure?')" type="submit" class="delete" style="float:left; cursor: pointer">
                                    <i class="text-red fas fa-trash-alt"></i>
                                </a>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        {{Form::close()}}
    </section>
    <!-- /.content -->
@endsection