@extends('adminlte::page')

@section('title', 'Subscribers')

@section('content_header')
    <h1>
        @lang('admin.listing_subscribers')
        <small>@lang('admin.it_all_subscribers_here')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fas fa-fw fa-tachometer-alt"></i> @lang('admin.home')</a></li>
        <li class="active">@lang('admin.listing_subscribers')</li>
    </ol>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'subscribers.index',
        'files' => true
    ]) }}
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('admin.listing_subscribers')</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('subscribers.create') }}" class="btn btn-success">@lang('button.add')</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>@lang('column.id')</th>
                        <th>@lang('column.name')</th>
                        <th>@lang('column.avatar')</th>
                        <th>@lang('column.email')</th>
                        <th>@lang('column.status')</th>
                        <th>@lang('column.language')</th>
                        <th>@lang('column.regData')</th>
                        <th>@lang('column.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subs as $k => $sub)
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            <td>{{ $sub->getName() }}</td>
                            <td>
                                <img src="{{ $sub->getAvatar() }}" alt="" width="60"
                                     style="-moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%;">
                            </td>
                            <td>{{ $sub->email }}</td>
                            <td>{{ $sub->getStatus() }}</td>
                            <td>{{ $sub->language_id ? $sub->language->title : '' }}</td>
                            <td>{{ $sub->updated_at }}</td>
                            <td>
                                {{ Form::open(['route'=>['subscribers.destroy', $sub->id], 'method'=>'delete']) }}
                                <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                    <i class="text-red fas fa-trash-alt"></i>
                                </button>
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