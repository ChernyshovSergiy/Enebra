@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_subscriber')
        <small>@lang('admin.it_add_subscriber_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('subscribers.index')}}"><i class="fa fa-user-plus"></i> @lang('admin.listing_subscribers')</a></li>
        <li class="active">@lang('admin.add_subscriber')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'subscribers.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_subscriber')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.email')</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('column.language')</label>
                        {{ Form::select('language_id',
                            $languages,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                    <div class="form-group">
                        <label>@lang('column.status')</label>
                        {{ Form::select('token',
                        [null => Lang::get('status.active'),
                        '7777' => Lang::get('status.wait')],
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('subscribers.index')}}" class="btn btn-default">@lang('button.back')</a>
                <button class="btn btn-success pull-right">@lang('button.add')</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{ Form::close() }}
    </section>
    <!-- /.content -->
@endsection