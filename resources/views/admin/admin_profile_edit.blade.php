@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">{{$data->name}} Profile Edit</h4>
                 <form method="POST" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" value="{{$data->name}}"  required="" id="name">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$data->username}}" name="username" required=""  id="username">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" name="email" required="" value="{{$data->email}}" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="tel" name="mobile" required="" value="{{$data->mobile}}" id="mobile">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" onchange="previewImage(event)" type="file" name="image"  id="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img  id="preview" src="{{!empty($data->profile_image)?asset('upload/profile/'.$data->profile_image):''}}"  class="rounded avatar-lg">
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
