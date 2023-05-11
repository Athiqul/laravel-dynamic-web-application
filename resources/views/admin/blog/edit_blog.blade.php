@extends('admin.admin_master')
@section('needed-css')
<link rel="stylesheet" href="{{asset('backend/assets/libs/tinymce/skins/ui/oxide/skin.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">Edit Blog</h4>
                 <form method="POST" id="submit" action="{{route('blog.update',$blog->id)}}" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" value="{{$blog->title}}"    id="title">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="exp" class="col-sm-2 col-form-label">Select Category</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="cat_id">
                            @foreach ($categories as $item )
                                <option value="{{$item->id}}" {{$blog->cat_id==$item->id?'Selected':''}}>{{$item->category}}</option>
                            @endforeach
                            </select>
                            @error('cat_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                    </div>
                </div>
                <!-- end row -->
               
                <div class="row mb-3">
                    <label for="long_desc" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="desc" aria-hidden="true">{{old('desc',$blog->desc)}}</textarea>
                        @error('desc')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="long_desc" class="col-sm-2 col-form-label">Tags</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tags" value="{{old('tags',$blog->tags)}}" data-role="tagsinput" placeholder="Add tags" />
                        @error('tags')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                   
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Blog Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" onchange="previewImage(event)" type="file" name="image_link"    id="image">
                        @error('image_link')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                   
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img  id="preview" src="{{asset('uploads/blogs/'.$blog->image_link)}}"  class="rounded avatar-lg">
                    </div>
                </div>
                <!-- end row -->
                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                 <input type="submit" value="Add Blog"  class="btn btn-info">
                 </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection

@section('custom-js')
<script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>
<script>

function previewImage(event) {
  var input = event.target;
  var reader = new FileReader();
  reader.onload = function(){
    var dataURL = reader.result;
    var preview = document.getElementById('preview');
    preview.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);



}

</script>
@endsection