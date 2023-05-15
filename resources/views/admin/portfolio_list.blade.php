@extends('admin.admin_master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Portfolio List</h4>

                <div class="table-responsive">
                    @if (!$portfolio->isEmpty())
                        
                  
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr >
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                               $serial=1;
                           @endphp
                           @foreach ($portfolio as $key=> $item )
                           <tr>
                            <td >{{++$key}}</td>
                            <td>{{$item->project_name}}</td>
                            <td ><img class="img-fluid" width="50" height="50" src="{{asset('uploads/projects/'.$item->image_link)}}" alt="" ></td>
                            
                            <td>
                                <a href="{{route('edit.portofolio',$item->id)}}" class="btn btn-outline-info btn-sm edit" title="Edit Image">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                               
                                <a href="{{url('/portofolio-delete/'.$item->id)}}" class="btn btn-outline-danger btn-sm delete" id="delete" title="Delete Image">
                                    <i class="fas fa-trash"></i>
                                </a>
                                
                               
                            </td>
                        </tr>
                               
                           @endforeach
                           
                        </tbody>
                    </table>
                    @else
                    <h6 class="text-center"> No portofolio added to the website</h6>
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection;
@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection