@extends('adminlte::page')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_answers')
                <small>@lang('admin.it_all_answers_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_answers')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'faq_answers.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_answers')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('faq_answers.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.question')</th>
                            <th>@lang('column.answer')</th>
                            <th>@lang('column.sort')</th>
                            <th>@lang('column.original')</th>
                            <th>@lang('column.user')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($answers as $answer)
                            <tr>
                                <td>{{ $answer->id }}</td>
                                <td>{!! Str::limit($answer->getQuestion(), 40, ' &raquo') !!}</td>
                                <td>{!! $answer->answer ? Str::limit($answer->answer->$locale, 100, ' &raquo') : '' !!}</td>
                                <td>{{ $answer->sort }}</td>
                                <td>{{ $answer->getOriginLang() }}</td>
                                <td>{{ $answer->getUserName() }}</td>
                                <td>
                                    {{--<a href="{{route('introduction_points.show', $inf_intr_point->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('faq_answers.edit', $answer->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                    <span style="float:left;">&emsp;or&emsp;</span>
                                    {{ Form::open(['route'=>['faq_answers.destroy', $answer->id], 'method'=>'delete']) }}
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
    </div>
    <!-- /.content-wrapper -->

@endsection