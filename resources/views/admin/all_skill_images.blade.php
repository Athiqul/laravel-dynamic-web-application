@extends('admin.admin_master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">About Skill Images</h4>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr >
                                <th>Sl.</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                               $serial=1;
                           @endphp
                           @foreach ($images as $image )
                           <tr>
                            <td >{{$serial++}}</td>
                            <td ><img class="img-fluid" width="50" height="50" src="{{asset('uploads/about/skills/'.$image->image_link)}}" alt="" ></td>
                            
                            <td>
                                <a href="{{route('edit.skill.image',$image->id)}}" class="btn btn-outline-info btn-sm edit" title="Edit Image">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                               
                                <a href="{{route('delete.skill.image',$image->id)}}" class="btn btn-outline-danger btn-sm delete" id="delete" title="Delete Image">
                                    <i class="fas fa-trash"></i>
                                </a>
                                
                                <a href="{{route('status.change.image',$image->id)}}" id="status-change" class="btn btn-outline-secondary btn-sm delete" title="{{$image->status=='1'?'Hide':'Show'}}">
                                    <i class="{{$image->status=='1'?'fas fa-eye-slash':'fas fa-eye'}}"></i>
                                </a>
                            </td>
                        </tr>
                               
                           @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection;
@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  
$(function(){
    $(document).on('click','#status-change',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Update Image status ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Update it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your skill Image has been updated.',
                        'success'
                      )
                    }
                  }) 


    });

  });
</script>
@endsection