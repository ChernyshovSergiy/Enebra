@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_country')
        <small>@lang('admin.it_add_country_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('countries.index')}}"><i class="fas fa-flag"></i> @lang('admin.listing_countries')</a></li>
        <li class="active">@lang('admin.add_country')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'countries.store', 'files' => true]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_country')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.object_name')</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('name') }}">
                        <p class="help-block">@lang('admin.country_format')</p>
                    </div>

                    <div class="form-group">
                        <label>@lang('column.language')</label>
                        {{ Form::select('language_id',
                            $language,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>

                    <div class="form-group">
                        <label>@lang('column.flag')</label>
                        {{ Form::select('image_id',
                            $flag_image,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>

                    <div class="form-group">
                        <label>@lang('column.id_documents')</label>
                        {{ Form::select('id_documents[]',
                            $id_documents,
                            null,
                            ['class' => 'form-control select2',
                            'multiple'=>"multiple"])
                        }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('countries.index')}}" class="btn btn-default">@lang('button.back')</a>
                <button class="btn btn-success pull-right">@lang('button.add')</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{ Form::close() }}
    </section>
    <!-- /.content -->
@endsection