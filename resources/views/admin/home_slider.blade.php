@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">Home Slider</h4>
                 <form method="POST" action="{{route('homeslider.store')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" value="{{$data->title?$data->title:''}}"   required="" id="title">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="short_desc" class="col-sm-2 col-form-label">Short Description:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="short_desc" required=""  value="{{$data->short_desc?$data->short_desc:''}}" id="short_desc">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="video_url" class="col-sm-2 col-form-label">Video Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="url" name="video_url" value="{{$data->video_url?$data->video_url:''}}" required="" id="video_url">
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
                        <img  id="preview" src="{{$data->image_link?asset('uploads/home/'.$data->image_link):''}}" class="rounded avatar-lg">
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
