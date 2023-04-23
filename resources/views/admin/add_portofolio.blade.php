@extends('admin.admin_master')
@section('needed-css')
<link rel="stylesheet" href="{{asset('backend/assets/libs/tinymce/skins/ui/oxide/skin.min.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">Add Portofolio</h4>
                 <form method="POST" action="{{route('store.portofolio')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="projectName" class="col-sm-2 col-form-label">Portofolio Name:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="project_name" value="{{old('project_name')}}" id="projectName">
                           @error('project_name')
                               <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                    </div>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Portofolio Title:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="project_title" value="{{old('project_title')}}"    required="" id="title">
                        @error('project_title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->
              
             
                <div class="row mb-3">
                    <label for="long_desc" class="col-sm-2 col-form-label">Portofolio Description:</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="project_desc" aria-hidden="true">{{old('project_desc')}}</textarea>
                        @error('project_desc')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Portoflio Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" onchange="previewImage(event)" type="file" name="image_link"   id="image">
                        @error('image_link')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img  id="preview" class="rounded avatar-lg">
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