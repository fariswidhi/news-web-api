@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
{{--                             @foreach ($data as $d) --}}
                                {{-- expr --}}
{{--                             @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
