@extends('adminlte::page')

@section('title', 'Introduction')

@section('content_header')
    <h1>
        @lang('admin.listing_introduction')
        <small>@lang('admin.the_introduction_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.introduction')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'introductions.store'
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.introduction')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('introductions.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>@lang('column.id')</th>
                        <th>@lang('column.title')</th>
                        <th>@lang('column.sub_title')</th>
                        <th>@lang('column.text')</th>
                        <th>@lang('column.replica')</th>
                        <th>@lang('column.conclusion')</th>
                        <th>@lang('column.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($introductions as $introduction)
                        <tr>
                            <td>{{ $introduction->id }}</td>
                            <td>{{ $introduction->getTitleFromMenu() }}</td>
                            <td>{!! $introduction->content ? $introduction->content->sub_title->$locale : '' !!}</td>
                            <td>{!! $introduction->content ? $introduction->content->text->$locale : '' !!}</td>
                            <td>{!! $introduction->content ? $introduction->content->replica->$locale : '' !!}</td>
                            <td>{!! $introduction->content ? $introduction->content->conclusion->$locale : '' !!}</td>
                            <td>
                                {{--<a href="{{route('introductions.show', $introduction->id)}}" class="fa fa-eye"></a>--}}
                                <a href="{{route('introductions.edit', $introduction->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                <span style="float:left;">&emsp;or&emsp;</span>
                                {{ Form::open(['route'=>['introductions.destroy', $introduction->id], 'method'=>'delete']) }}
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