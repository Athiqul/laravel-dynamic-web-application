@extends('admin.admin_master');
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">Add Multiple Skills Images</h4>
                 <form method="POST" action="{{route('store.skills.images')}}" enctype="multipart/form-data">
                    @csrf         
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" onchange="previewImage(event)" type="file" name="images[]" multiple=""   id="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img  id="preview"  class="rounded avatar-lg">
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