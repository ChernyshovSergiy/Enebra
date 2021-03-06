@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_plan_phase_sec')
        <small>@lang('admin.the_add_plan_phase_sec_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('inf_plan_phase_sections.index')}}"><i class="fas fa-map-signs"></i> @lang('admin.listing_plan_phases_sec')</a></li>
        <li class="active">@lang('admin.add_plan_phase_sec')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'inf_plan_phase_sections.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_plan_phase_sec')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    @foreach($languages as $language)
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name'): {{$language}}</label>
                            <input type="text" name="{{'sub_title'.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('sub_title'.':'.$language) }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('inf_plan_phase_sections.index')}}" class="btn btn-default">@lang('button.back')</a>
                <button class="btn btn-success pull-right">@lang('button.add')</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{ Form::close() }}
    </section>
    <!-- /.content -->
@endsection