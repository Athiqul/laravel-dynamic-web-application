@extends('admin.admin_master')
@section('needed-css')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">Home Slider</h4>
                 <form method="POST" id="homeSlider" action="{{route('homeslider.store')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3 ">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10 form-group">
                        <input class="form-control" type="text" name="title" value="{{$data->title?$data->title:''}}"    id="title">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="short_desc" class="col-sm-2 col-form-label">Short Description:</label>
                    <div class="col-sm-10 form-group">
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





@endsection
@section('custom-js')
<script src="{{asset('backend/assets/js/validate.min.js')}}"></script>
<script>
  $(document).ready(function (){
        $('#homeSlider').validate({
            rules: {
                title: {
                    required : true,
                    minlength:5,
                }, 
            },
            short_desc: {
                    required : true,
                    minlength:5,
                },
            messages :{
                title: {
                    required : 'Please Enter Home Slider Title',
                    minlength:'Too short title!'
                },
                short_desc: {
                    required : 'Please Enter Home Slider short description',
                    minlength:'Too much short !'
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
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