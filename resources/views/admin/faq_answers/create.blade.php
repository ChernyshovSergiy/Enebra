@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.add_answer')
        <small>@lang('admin.it_add_answer_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('faq_answers.index')}}"><i class="fas fa-info-circle"></i> @lang('admin.listing_answers')</a></li>
        <li class="active">@lang('admin.add_answer')</li>
    </ol>
@stop

@section('content')
<!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'faq_answers.store']) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.add_answer')</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.question')</label>
                        {{ Form::select('faq_question_id',
                            $questions,
                            old('faq_question_id'),
                            ['class' => 'form-control select2',
                            'placeholder' => Lang::get('admin.select_question')])
                        }}
                    </div>
                    @foreach($languages as $language)
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.answer'): {{$language}}</label>
                            <textarea name="{{'answer'.':'.$language}}" id="" cols="80" rows="10" class="form-control">{{old('answer'.':'.$language)}}</textarea>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.sort')</label>
                        <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('sort') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.original')</label>
                        {{ Form::select('language_id',
                            $languages,
                            old('language_id'),
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('column.user')</label>
                        {{ Form::select('user_id',
                            $user_names,
                            old('user_id'),
                            ['class' => 'form-control select2'])
                        }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('faq_answers.index')}}" class="btn btn-default">@lang('button.back')</a>
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