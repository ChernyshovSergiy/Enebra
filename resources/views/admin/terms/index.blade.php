@extends('adminlte::page')

@section('title', 'Terms')

@section('content_header')
    <h1>
        @lang('admin.listing_terms')
        <small>@lang('admin.it_all_terms_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.listing_terms')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'terms.store'
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.listing_terms')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('terms.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        {{--<th>@lang('column.id')</th>--}}
                        <th>@lang('column.title')</th>
                        <th>@lang('column.left_textarea')</th>
                        <th>@lang('column.right_textarea')</th>
                        <th>@lang('column.down_textarea')</th>
                        <th>@lang('column.views_count')</th>
                        <th>@lang('column.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($terms as $term)
                        <tr>
                            {{--<td>{{ $term->id }}</td>--}}
                            <td>{!! $term->content ? Str::limit($term->content->title->$locale, 20, ' &raquo') : '' !!}</td>
                            <td>{!! $term->content ? Str::limit($term->content->left_textarea->$locale, 100, ' &raquo') : '' !!}</td>
                            <td>{!! $term->content ? Str::limit($term->content->right_textarea->$locale, 100, ' &raquo') : '' !!}</td>
                            <td>{!! $term->content ? Str::limit($term->content->down_textarea->$locale, 100, ' &raquo') : '' !!}</td>
                            <td>{{ $term->views_count ?? $term->views_count }}</td>
                            <td>
                                {{--<a href="{{route('introductions.show', $term->id)}}" class="fa fa-eye"></a>--}}
                                <a href="{{route('terms.edit', $term->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                <span style="float:left;">&emsp;or&emsp;</span>
                                {{ Form::open(['route'=>['terms.destroy', $term->id], 'method'=>'delete']) }}
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

@section('js')
    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
@stop