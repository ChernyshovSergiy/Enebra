@extends('adminlte::page')

@section('title', 'Plan Sections')

@section('content_header')
    <h1>
        @lang('admin.listing_plan_phases_sec')
        <small>@lang('admin.the_plan_phases_sec_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active"> @lang('admin.listing_plan_phases_sec')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'inf_plan_phases.store'
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.listing_plan_phases_sec')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('inf_plan_phase_sections.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>@lang('column.id')</th>
                        <th>@lang('column.object_name')</th>
                        <th>@lang('column.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plan_phase_sections as $plan_phase_section)
                        <tr>
                            <td>{{ $plan_phase_section->id }}</td>
                            <td>{{ $plan_phase_section->sub_title ? $plan_phase_section->sub_title->$locale : ''  }}</td>
                            <td>
                                {{--<a href="{{route('inf_plan_phase_sections.show', $plan_phase_section->id)}}" class="fa fa-eye"></a>--}}
                                <a href="{{route('inf_plan_phase_sections.edit', $plan_phase_section->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                <span style="float:left;">&emsp;or&emsp;</span>
                                {{ Form::open(['route'=>['inf_plan_phase_sections.destroy', $plan_phase_section->id], 'method'=>'delete']) }}
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