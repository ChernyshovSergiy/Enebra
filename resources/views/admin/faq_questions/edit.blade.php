@extends('adminlte::page')

@section('content_header')
    <h1>
        @lang('admin.edit_question')
        <small>@lang('admin.it_edit_question_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li><a href="{{route('faq_questions.index')}}"><i class="fas fa-question-circle"></i> @lang('admin.listing_questions')</a></li>
        <li class="active">@lang('admin.edit_question')</li>
    </ol>
@stop

@section('content')
        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['faq_questions.update', $question->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_question')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.section')</label>
                            {{ Form::select('menu_id',
                                $page_names,
                                $question->menu_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.question'): {{$language}}</label>
                                <textarea name="{{'question'.':'.$language}}" id="" cols="80" rows="10" class="form-control">
                                    {{ $question->question ? $question->question->$language : ''}}</textarea>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $question->sort }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.user')</label>
                            {{ Form::select('user_id',
                                $user_names,
                                $question->user_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('faq_questions.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-warning pull-right">@lang('button.edit')</button>
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