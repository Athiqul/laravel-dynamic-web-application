@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Blog List</h4>

                <div class="table-responsive">
                    @if (count($blogs)==0)
                     <h4 class="text-center">No Blog added yet</h4> 
                     @else
                     <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr >
                                <th>SL.</th>
                                <th>Blog Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                               $serial=1;
                           @endphp
                           @foreach ($blogs as $blog )
                           <tr>
                            <td >{{$serial++}}</td>
                            <td >{{$blog->title}}</td>
                            <td>@foreach ($categories as $item )
                                @if ($item->id==$blog->cat_id)
                                    {{$item->category}}
                                    @break
                                @endif
                            @endforeach</td>
                            <td>
                                <img src="{{asset('uploads/blogs/'.$blog->image_link)}}" class="rounded avatar-sm" alt="">
                            </td>
                            
                            <td>
                                <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-outline-info btn-sm edit" title="Edit Blog">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                               
                                <a href="{{route('blog.delete',$blog->id)}}" class="btn btn-outline-danger btn-sm delete" id="delete" title="Delete Blog">
                                    <i class="fas fa-trash"></i>
                                </a>
                                
                                
                            </td>
                        </tr>
                               
                           @endforeach
                           
                        </tbody>
                    </table>
                    @endif
                   
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
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