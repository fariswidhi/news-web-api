@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Article Detail</div>

                <div class="panel-body">
                   <h3>{{$data->title}}</h3>
                   <h5>{{$data->category->category}}</h5>
                    <img src="{{ url('uploads/'.$data->photo) }}" class="img img-responsive">
                    <br>
                    {!! $data->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
