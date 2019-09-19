@extends('adminlte::page')

@section('title', 'Plan Points')

@section('content_header')
    <h1>
        @lang('admin.listing_plan_phases_sec_point')
        <small>@lang('admin.the_plan_phases_sec_point_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active"> @lang('admin.listing_plan_phases_sec_point')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'inf_plan_phase_section_points.store'
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.listing_plan_phases_sec_point')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('inf_plan_phase_section_points.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>@lang('column.id')</th>
                        <th>@lang('column.is_done')</th>
                        <th>@lang('column.point')</th>
                        <th>@lang('column.description')</th>
                        <th>@lang('column.phase')</th>
                        <th>@lang('column.section')</th>
                        <th>@lang('column.sort')</th>
                        <th>@lang('column.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plan_phase_section_points as $plan_phase_section_point)
                        <tr>
                            <td>{{ $plan_phase_section_point->id }}</td>
                            <td>
                                @if($plan_phase_section_point->is_done === 1)
                                    <a href="/admin/inf_plan_phase_section_points/toggle/{{ $plan_phase_section_point->id }}" class="text-green fa fa-check-circle"></a>
                                @else
                                    <a href="/admin/inf_plan_phase_section_points/toggle/{{ $plan_phase_section_point->id }}" class="text-muted fa fa-circle"></a>
                                @endif
                            </td>
                            <td>{!! $plan_phase_section_point->entry ? $plan_phase_section_point->entry->point->$locale : ''  !!}</td>
                            <td>{!! $plan_phase_section_point->entry ? Str::limit($plan_phase_section_point->entry->description->$locale, 100 ) : ''  !!}</td>
                            <td>{{ $plan_phase_section_point->getPhase()}}</td>
                            <td>{{ $plan_phase_section_point->getSection()}}</td>
                            <td>{{ $plan_phase_section_point->sort }}</td>
                            <td>
                                <a href="{{route('inf_plan_phase_section_points.edit', $plan_phase_section_point->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                <span style="float:left;">&emsp;or&emsp;</span>
                                {{ Form::open(['route'=>['inf_plan_phase_section_points.destroy', $plan_phase_section_point->id], 'method'=>'delete']) }}
                                <a onclick="return confirm('are you sure?')" type="submit" class="delete" style="float:left; cursor: pointer">
                                    <i class="text-red fas fa-trash-alt"></i>
                                </a>
                                <!-- Button trigger modal -->
                                {{--<button type="button" class="delete" data-toggle="modal" data-target="#modal-default">--}}
                                    {{--<i class="fa fa-remove"></i>--}}
                                {{--</button>--}}
                                {{--<div class="modal fade" id="modal-default">--}}
                                    {{--<div class="modal-dialog">--}}
                                        {{--<div class="modal-content">--}}
                                            {{--<div class="modal-header">--}}
                                                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                                    {{--<span aria-hidden="true">&times;</span></button>--}}
                                                {{--<h4 class="modal-title">Are you wont to delete this entry</h4>--}}
                                            {{--</div>--}}
                                            {{--<div class="modal-body">--}}
                                                {{--<p>Are you sure?&hellip;</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="modal-footer">--}}
                                                {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
                                                {{--<button type="submit" class="btn btn-primary">Delete</button>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<!-- /.modal-content -->--}}
                                    {{--</div>--}}
                                    {{--<!-- /.modal-dialog -->--}}
                                {{--</div>--}}
                                {{--<!-- /.modal -->--}}
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