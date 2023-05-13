@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center mb-4">Footer</h4>
                 <form method="POST" action="{{route('footer.update')}}">
                    @csrf
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="tel" name="contact_number" value="{{old('contact_number',$data->contact_number??'')}}"   required="">
                        @error('contact_number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                       
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" id="email" name="contact_email" value="{{old('contact_email',$data->contact_email??'')}}">
                        @error('contact_email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="region" class="col-sm-2 col-form-label">Region (Country/State)</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="address" id="region" name="region" value="{{old('region',$data->region??'')}}">
                        @error('region')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="street_address" class="col-sm-2 col-form-label">Street Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="address" id="street_address" name="street_address" value="{{old('street_address',$data->street_address??'')}}">
                        @error('street_address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="social_connect" class="col-sm-2 col-form-label">Social Connect Message</label>
                    <div class="col-sm-10">
                        
                        <textarea required="" class="form-control" id="social_connect" name="social_connect" rows="5">{{old('social_connect',$data->social_connect??'')}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="contact_us" class="col-sm-2 col-form-label">Contact Us Message</label>
                    <div class="col-sm-10">
                        
                        <textarea required="" class="form-control" id="contact_us" name="contact_us"  rows="5">{{old('social_connect',$data->contact_us??'')}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="facebook" class="col-sm-2 col-form-label"><i class=" fab fa-facebook-square"></i> Facebook Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="url" id="facebook" name="facebook" value="{{old('facebook',$data->facebook??'')}}">
                    </div>
                </div>
               
                <div class="row mb-3">
                    <label for="twitter" class="col-sm-2 col-form-label"><i class=" fab fa-twitter"></i> Twitter Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="url" id="twitter" name="twitter" value="{{old('twitter',$data->twitter??'')}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="youtube" class="col-sm-2 col-form-label"><i class=" fab fa-youtube"></i> Youtube Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="url" id="youtube" name="youtube" value="{{old('youtube',$data->youtube??'')}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="linkedin" class="col-sm-2 col-form-label"><i class="fab fa-linkedin"></i> Linkedin Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="url" id="linkedin" name="linkedin" value="{{old('linkedin',$data->linkedin??'')}}">
                       
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="whatsapp" class="col-sm-2 col-form-label"><i class="fab fa-whatsapp-square"></i> WhatsApp Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="url" id="whatsapp" name="whatsapp" value="{{old('whatsapp',$data->whatsapp??'')}}">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="instagram" class="col-sm-2 col-form-label"><i class="fab fa-instagram-square"></i> Instagram Link</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="url" id="instagram" name="instagram" value="{{old('instagram',$data->instagram??'')}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="copyright" class="col-sm-2 col-form-label"><i class="fas fa-copyright"></i> Copyright</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="url" id="copyright" name="copyright" value="{{old('copyright',$data->instagram??'')}}">
                    </div>
                </div>
                <!-- end row -->
                

                
                <!-- end row -->
                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                 <input type="submit" value="Footer Update" class="btn btn-info">
                 </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>




@endsection
