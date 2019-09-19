@extends('adminlte::page')

@section('title', 'Social Links')

@section('content_header')
    <h1>
        @lang('admin.listing_social_links')
        <small>@lang('admin.it_all_social_links_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.listing_social_links')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'social_links.store',
        'files' => true
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.listing_social_links')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('social_links.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.object_name')</th>
                            <th>@lang('column.is_active')</th>
                            <th>@lang('column.url')</th>
                            <th>@lang('column.sort')</th>
                            <th>@lang('column.image_id')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($social_links as $social_link)
                            <tr>
                                <td>{{ $social_link->id }}</td>
                                <td>{{ $social_link->name }}</td>
                                <td>
                                    @if($social_link->is_active === 1)
                                        <a href="/admin/social_links/toggle/{{ $social_link->id }}" class="text-green fas fa-fw fa-thumbs-up"></a>
                                    @else
                                        <a href="/admin/social_links/toggle/{{ $social_link->id }}" class="text-muted fas fa-fw fa-lock"></a>
                                    @endif
                                </td>
                                    <td>{{ $social_link ? $social_link->url->$locale : '' }}</td>
                                <td>{{ $social_link->sort }}</td>
                                <td>
                                    <img src="{{ $social_link->getImage() }}" alt="" width="30">
                                </td>
                                <td>
                                    <a href="{{route('social_links.edit', $social_link->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                    <span style="float:left;">&emsp;or&emsp;</span>
                                    {{ Form::open(['route'=>['social_links.destroy', $social_link->id], 'method'=>'delete']) }}
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
