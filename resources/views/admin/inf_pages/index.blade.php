@extends('adminlte::page')

@section('title', 'Pages')

@section('content_header')
    <h1>
        @lang('admin.listing_pages')
        <small>@lang('admin.it_all_pages_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.listing_pages')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
        <section class="content container-fluid" style="overflow-x:scroll;">
        {{ Form::open([
            'route' => 'inf_pages.store',
            'files' => true
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_pages')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('inf_pages.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.user')</th>
                            <th>@lang('column.title')</th>
                            <th>@lang('column.sub_title')</th>
                            <th>@lang('column.description')</th>
                            <th>@lang('column.top_textarea')</th>
                            <th>@lang('column.left_textarea')</th>
                            <th>@lang('column.right_textarea')</th>
                            <th>@lang('column.views_count')</th>
                            <th>@lang('column.image')</th>
                            <th>@lang('column.menu')</th>
                            <th>@lang('column.if_desc')</th>
                            <th>@lang('column.text_description')</th>
                            <th>@lang('column.sort')</th>
                            <th>@lang('column.original')</th>
                            <th>@lang('column.keywords')</th>
                            <th>@lang('column.meta_desc')</th>
                            <th>@lang('column.meta_id')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            @if($page->title->is_active !== 0)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->user->first_name .' '.$page->user->last_name }}</td>
                                <td>{{ $page->getTitle() }}</td>
                                <td>{!! $page->text ? Str::limit($page->text->sub_title->$locale, 20 ) : '' !!}</td>
                                <td>{!! $page->text ? Str::limit($page->text->description->$locale, 20, ' &raquo') : '' !!}</td>
                                <td>{!! $page->text ? Str::limit($page->text->top_textarea->$locale, 20 ) : '' !!}</td>
                                <td>{!! $page->text ? Str::limit($page->text->left_textarea->$locale, 20 ) : '' !!}</td>
                                <td>{!! $page->text ? Str::limit($page->text->right_textarea->$locale, 20 ) : '' !!}</td>
                                <td>{{ $page->views_count }}</td>
                                <td>
                                    <img src="{{ $page->getImage() }}" alt="" width="70">
                                </td>
                                <td>{{ $page->menu }}</td>
                                <td>{{ $page->if_desc }}</td>
                                <td>{!! $page->text ? Str::limit($page->text->text_description->$locale , 20) : '' !!}</td>
                                <td>{{ $page->sort }}</td>
                                <td>{{ $page->language->title }}</td>
                                <td>{!! $page->text ? Str::limit($page->text->keywords->$locale, 20 ) : '' !!}</td>
                                <td>{!! $page->text ? Str::limit($page->text->meta_desc->$locale, 20 ) : '' !!}</td>
                                <td>{{ $page->meta_id }}</td>
                                <td>
                                    <a href="{{route('inf_pages.edit', $page->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                    <span style="float:left;">&emsp;or&emsp;</span>
                                    {{ Form::open(['route'=>['inf_pages.destroy', $page->id], 'method'=>'delete']) }}
                                    <a onclick="return confirm('are you sure?')" type="submit" class="delete" style="float:left; cursor: pointer">
                                        <i class="text-red fas fa-trash-alt"></i>
                                    </a>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endif
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

@section('css')
    <link href="{{ asset( 'css/container_fluid.css' ) }}" rel="stylesheet"/>
@stop

@section('js')
    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
@stop