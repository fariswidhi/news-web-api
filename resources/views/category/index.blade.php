@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category</div>

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

    <a href="{{ url('/category/create') }}" class="btn btn-primary">Create</a>
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @if (count($data)==null)
                            {{-- expr --}}
                            <tr>
                                <td colspan="3"><center>Data Not Found</center></td>
                            </tr>
                            @else
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->category}}</td>
                                    <td>
                                        <a href="{{ url('/category/'.$d->id) }}" class="btn btn-primary">Detail</a>
                                        <a href="{{ url('/category/'.$d->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        <form action="{{ url('/category/'.$d->id) }}" method="post" style="display: inline;">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
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
