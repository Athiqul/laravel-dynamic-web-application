@extends('admin.admin_master');
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">Edit Category</h4>
                 <form method="POST" action="{{route('blog.category.edit',$category->id)}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="projectName" class="col-sm-2 col-form-label">Category Name:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="category" value="{{old('category',$category->category)}}" id="category">
                           @error('category')
                               <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                    </div>
              
                <!-- end row -->
                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                 <input type="submit" value="Update Category" class="btn btn-info">
                 </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection