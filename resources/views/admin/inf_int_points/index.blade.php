@extends('adminlte::page')

@section('title', 'Introduction Points')

@section('content_header')
    <h1>
        @lang('admin.listing_introduction_points')
        <small>@lang('admin.it_all_introduction_points_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.introduction_points')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'introduction_points.store'
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.introduction_points')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('introduction_points.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>@lang('column.id')</th>
                        <th>@lang('column.point')</th>
                        <th>@lang('column.link')</th>
                        <th>@lang('column.sort')</th>
                        <th>@lang('column.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inf_intr_points as $inf_intr_point)
                        <tr>
                            <td>{{ $inf_intr_point->id }}</td>
                            <td>{!! $inf_intr_point->point ? $inf_intr_point->point->$locale : '' !!}</td>
                            <td>{{ $inf_intr_point->getLinkPageTitle() }}</td>
                            <td>{{ $inf_intr_point->sort }}</td>
                            <td>
                                {{--<a href="{{route('introduction_points.show', $inf_intr_point->id)}}" class="fa fa-eye"></a>--}}
                                <a href="{{route('introduction_points.edit', $inf_intr_point->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                <span style="float:left;">&emsp;or&emsp;</span>
                                {{ Form::open(['route'=>['introduction_points.destroy', $inf_intr_point->id], 'method'=>'delete']) }}
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

@section('js')
    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
@stop