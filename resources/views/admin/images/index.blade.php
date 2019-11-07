@extends('adminlte::page')

@section('title', 'Images')

@section('content_header')
    <h1>
        @lang('admin.listing_images')
        <small>@lang('admin.it_all_images_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.images')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
{{--    {{ Form::open([--}}
{{--        'route' => 'images.store',--}}
{{--        'files' => true--}}
{{--    ]) }}--}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.listing_images')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('images.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.name')</th>
                            <th>@lang('column.category')</th>
                            <th>@lang('column.author')</th>
                            <th>@lang('column.image')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($images->chunk( 10 ) as $parts)
                        @foreach($parts as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td>{{ $image->title }}</td>
                                <td>{{ $image->image_category->title }}</td>
                                <td>{{ $image->getUserName() }}</td>
                                <td>
                                    <img src="{{ $image->getImage() }}" alt="" width="30">
                                <td>
                                    {{--<a href="{{route('images.show', $image->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('images.edit', $image->id)}}" class="text-yellow fas fa-pen-alt" style="float:left;"></a>
                                    <span style="float:left;">&emsp;or&emsp;</span>
                                    {!! Form::open(['route'=>['images.destroy', $image->id], 'method'=>'delete'])  !!}
                                    <a onclick="return confirm('are you sure?')" type="submit" class="delete" style="float:left; cursor: pointer">
                                        <i class="text-red fas fa-trash-alt"></i>
                                    </a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
{{--    {{Form::close()}}--}}
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