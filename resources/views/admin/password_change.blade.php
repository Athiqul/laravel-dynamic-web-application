@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">Password Change</h4>
                @if (count($errors))
                    @foreach ( $errors->all() as $error )
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <i class="mdi mdi-bullseye-arrow me-2"></i>
                       {{$error}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endforeach
                @endif
                 <form method="POST" action="{{route('admin.password.store')}}" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3">
                    <label for="old_password" class="col-sm-2 col-form-label">Old Password:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="old_password"  required="" id="old_password">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="new_password" class="col-sm-2 col-form-label">New Password:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password"  name="new_password" required=""  id="new_password">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="con_password" class="col-sm-2 col-form-label">Confirm Password:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="confirm_password" required=""  id="con_password">
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
