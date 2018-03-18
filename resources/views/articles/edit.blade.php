@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Article</div>

                <div class="panel-body">
                    <form action="{{ url('/articles/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-lg-12">
                            
                        <div class="form-group">
                    
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{$data->title}}">
                        </div>
                            <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control" >
                            </div>
                            <div class="form-group">
                            <label>Content</label>
                            <textarea id="summernote" class="form-control" name="content">{{$data->content}}</textarea>
                            </div>
                            <div class="form-group">
                            <label>
                                Category
                            </label>
                            <select class="form-control" name="category">
                                @foreach ($categories as $category)
                                    {{-- expr --}}
                                    <option {{$data->category_id==$category->id ? 'selected':''}} value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                            </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
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



@push('script')
    {{-- expr --}}
<script type="text/javascript">
    $(document).ready(function() {
  $('#summernote').summernote({
     toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
  });
});
</script>
@endpush