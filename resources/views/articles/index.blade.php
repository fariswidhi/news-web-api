@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Article</div>

                <div class="panel-body">

    @if (session('success'))
    @component('alert.success')
        {{session('success')}}
    @endcomponent
    @endif
    @if (session('failed'))
    @component('alert.danger')
        {{session('failed')}}
    @endcomponent
    @endif

    <a href="{{ url('/articles/create') }}" class="btn btn-primary">Create</a>
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->title}}</td>
                                    <td>

                                        <a href="{{ url('/articles/'.$d->id) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ url('/articles/'.$d->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        <form action="{{ url('/articles/'.$d->id) }}" method="post" style="display: inline;">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <center>
                    {{$data->links()}}
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
