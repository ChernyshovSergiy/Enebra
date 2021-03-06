@extends('adminlte::page')

@section('title', 'Plan Phases')

@section('content_header')
    <h1>
        @lang('admin.listing_plan_phases')
        <small>@lang('admin.the_plan_phases_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.listing_plan_phases')</li>
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
                <h3 class="box-title">@lang('admin.listing_plan_phases')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('inf_plan_phases.create') }}" class="btn btn-success">@lang('button.add')</a>
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
                    @foreach($plan_phases as $plan_phase)
                        <tr>
                            <td>{{ $plan_phase->id }}</td>
                            <td>{{ $plan_phase->title ? $plan_phase->title->$locale : '' }}</td>
                            <td>
                                {{--<a href="{{route('inf_plan_phases.show', $plan_phase->id)}}" class="fa fa-eye"></a>--}}
                                <a href="{{route('inf_plan_phases.edit', $plan_phase->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                <span style="float:left;">&emsp;or&emsp;</span>
                                {{ Form::open(['route'=>['inf_plan_phases.destroy', $plan_phase->id], 'method'=>'delete']) }}
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