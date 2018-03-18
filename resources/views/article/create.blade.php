@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Article</div>

                <div class="panel-body">
                    <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            
                        <div class="form-group">
                    
                            <label>Title</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group">
                    
                            <label>Thumbnail</label>
                            <input type="file" name="" class="form-control">
                        </div>
                        <div class="form-group">
                    
                            <label>Title</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
