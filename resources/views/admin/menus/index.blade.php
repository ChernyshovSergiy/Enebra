@extends('adminlte::page')

@section('title', 'Menu')

@section('content_header')
    <h1>
        @lang('admin.listing_menu_points')
        <small>@lang('admin.it_all_menu_points_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.listing_menu_points')</li>
    </ol>
@stop

@section('content')

    <!-- Content Wrapper. Contains page content -->
{{--    <div class="content-wrapper">--}}

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'inf_menus.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_menu_points')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('inf_menus.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang('column.id')</th>
                                <th>@lang('column.title')</th>
                                <th>@lang('column.is_active')</th>
                                <th>@lang('column.url')</th>
                                <th>@lang('column.parent')</th>
                                <th>@lang('column.sort')</th>
                                <th>@lang('column.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inf_menu_points as $point)
                                <tr>
                                    <td>{{ $point->id }}</td>
                                    <td>{!! $point->title ? $point->title->$locale : '' !!}</td>
                                    <td>
                                        @if($point->is_active === 1)
                                            <a href="/admin/inf_menus/toggle/{{ $point->id }}" class="text-green fas fa-fw fa-thumbs-up"></a>
                                        @else
                                            <a href="/admin/inf_menus/toggle/{{ $point->id }}" class="text-muted fas fa-fw fa-lock"></a>
                                        @endif
                                    </td>
                                    <td>{{ $point->url }}</td>
                                    <td>{{ $point->getParent() }}</td>
                                    <td>{{ $point->sort }}</td>
                                    <td>
                                        <a href="{{route('inf_menus.edit', $point->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                        <span style="float:left;">&emsp;or&emsp;</span>
                                        {{ Form::open(['route'=>['inf_menus.destroy', $point->id], 'method'=>'delete']) }}
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
{{--    </div>--}}
    <!-- /.content-wrapper -->

@endsection

@section('js')
    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
@stop
