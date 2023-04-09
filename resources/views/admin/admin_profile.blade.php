@extends('admin.admin_master')
@section('content')

<div class="row">


    <div class="col-md-6 col-xl-6">

        <div class="card">
           <center class="mt-4">
            <img class="rounded-circle avatar-xl" src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image cap">
           </center>
            <div class="card-body text-center ">
                <h4 class="card-title">Name: {{$adminData->name}}</h4>
                 <h4 class="card-title">Username: {{$adminData->username}}</h4>
                 <h4 class="card-title">Email: {{$adminData->email}}</h4>
                 <h4 class="card-title">Mobile: {{$adminData->mobile}}</h4>
                 <h4 class="card-title">Verified Date: {{$adminData->email_verified_at}}</h4>
                 <h4 class="card-title">Account Created: {{$adminData->created_at}}</h4>
            </div>

            <div class="card-body">
                <a href="{{route('admin.profile.edit')}}" class="btn btn-info btn-rounded waves-effect waves-light ">Edit Profile</a>

            </div>
        </div>

    </div><!-- end col -->
<!-- end col -->


</div>

@endsection
