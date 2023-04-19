@extends('admin.admin_master')
@section('needed-css')
<link rel="stylesheet" href="{{asset('backend/assets/libs/tinymce/skins/ui/oxide/skin.min.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">About page info</h4>
                 <form method="POST" action="{{route('store.about')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" value="{{$data->title??''}}"   required="" id="title">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="exp" class="col-sm-2 col-form-label">Experience/Achievement:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="exp" id="exp" required=""  value="{{$data->exp??''}}" id="short_desc">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <textarea required="" class="form-control" name="short_desc" id="short_desc" rows="5">{{$data->short_desc}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="long_desc" class="col-sm-2 col-form-label">Long Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="long_desc" aria-hidden="true">{{$data->long_desc}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" onchange="previewImage(event)" type="file" name="image_link"   id="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img  id="preview" src="{{asset('uploads/about/'.$data->image_link??'')}}"  class="rounded avatar-lg">
                    </div>
                </div>
                <!-- end row -->
                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                 <input type="submit" value="Submit" class="btn btn-info">
                 </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection

@section('custom-js')
<script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
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