@extends('adminlte::page')

@section('title', 'Languages')

@section('content_header')
    <h1>
        @lang('admin.listing_languages')
        <small>@lang('admin.it_all_languages_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.listing_languages')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'languages.store',
        'files' => true
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.listing_languages')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('languages.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>@lang('column.id')</th>
                        <th>@lang('column.is_active')</th>
                        <th>@lang('column.slug')</th>
                        <th>@lang('column.object_name')</th>
                        <th>@lang('column.localization')</th>
                        <th>@lang('column.flag')</th>
                        <th>@lang('column.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td>{{ $language->id }}</td>
                            <td>
                                @if($language->is_active === 1)
                                    <a href="/admin/languages/toggle/{{ $language->id }}" class="text-green fas fa-fw fa-thumbs-up"></a>
                                @else
                                    <a href="/admin/languages/toggle/{{ $language->id }}" class="text-muted fas fa-fw fa-lock"></a>
                                @endif
                            </td>
                            <td>{{ $language->slug }}</td>
                            <td>{{ $language->title }}</td>
                            <td>{{ $language->localization }}</td>
                            <td>
                                <img src="{{ $language->getFlagImage() }}" alt="" width="30">
                            <td>
                                {{--<a href="{{route('languages.show', $language->id)}}" class="fa fa-eye"></a>--}}
                                <a href="{{route('languages.edit', $language->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                <span style="float:left;">&emsp;or&emsp;</span>
                                {{ Form::open(['route'=>['languages.destroy', $language->id], 'method'=>'delete']) }}
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