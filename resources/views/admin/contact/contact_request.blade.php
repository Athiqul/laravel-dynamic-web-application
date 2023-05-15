@extends('admin.admin_master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Customer Request List</h4>

                <div class="table-responsive">
                    @if (!$contactList->isEmpty())
                        
                  
                    <table class="table  table-nowrap align-middle ">
                        <thead>
                            <tr >
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>telephone</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                               $serial=1;
                           @endphp
                           @foreach ($contactList as $item )
                           <tr>
                            <td >{{$serial++}}</td>
                            <td>{{$item->customer_name}}</td>
                            <td >{{$item->email}}</td>
                            <td >{{$item->contact_number}}</td>
                            <td >{{$item->subject}}</td>
                            <td >{{$item->message}}</td>
                            <td >{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                            
                            <td>
                               
                               
                                <a href="{{route('contact.delete',$item->id)}}" class="btn btn-outline-danger btn-sm delete" id="delete" title="Delete Image">
                                    <i class="fas fa-trash"></i>
                                </a>
                                
                               
                            </td>
                        </tr>
                               
                           @endforeach
                           
                        </tbody>
                    </table>
                    @else
                    <h6 class="text-center"> No Customer Query </h6>
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