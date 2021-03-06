@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_goal')
        <small>@lang('admin.it_add_goal_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('purposes.index')}}"><i class="far fa-dot-circle"></i> @lang('admin.listing_goals')</a></li>
        <li class="active">@lang('admin.add_goal')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'purposes.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_goal')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.page')</label>
                        {{ Form::select('menu_id',
                            $page_names,
                            5,
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                    @foreach($languages as $language)
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.goal'): {{$language}}</label>
                            <textarea name="{{'goal'.':'.$language}}" id="" cols="80" rows="10" class="form-control">{{old('goal'.':'.$language)}}</textarea>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.sort')</label>
                        <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('sort') }}">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('purposes.index')}}" class="btn btn-default">@lang('button.back')</a>
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