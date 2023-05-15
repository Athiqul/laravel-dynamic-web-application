@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Blog Category List</h4>

                <div class="table-responsive">
                    @if (count($categories)==0)
                     <h4 class="text-center">No category added yet</h4> 
                     @else
                     <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr >
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                           @foreach ($categories as $key=>$category )
                           <tr>
                            <td >{{++$key}}</td>
                            <td >{{$category->category}}</td>
                            
                            <td>
                                <a href="{{route('blog.category.edit',$category->id)}}" class="btn btn-outline-info btn-sm edit" title="Edit Category">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                               
                                <a href="{{route('blog.category.delete',$category->id)}}" class="btn btn-outline-danger btn-sm delete" id="delete" title="Delete Image">
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