@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">View Admins</h5>
            <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Stauts</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->phone }}</td>
                <td>{{ $a->department }}</td>
                <td>{{ $a->status }}</td>
                <td>
                    <a href="{{url('/root/edit-dep-admin/'.$a->id)}}" class="btn btn-secondary"><i class="ti ti-edit"></i> Edit</a>
                    <a href="" data-toggle="modal" data-target="#myModal{{$a->id}}" class="btn btn-danger"><i class="ti ti-trash"></i> Delete</a>
                    
                            <!-- The Delete Modal -->
                            <div class="modal fade" id="myModal{{$a->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                              
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Delete  Confirmation</h4>
                                  <i type="button" data-dismiss="modal" class="ti ti-x"></i>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                  Are you sure you want to delete <b>{{$a->name}}</b>?
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="{{url('/root/delete-dep-admin/'.$a->id)}}" class="btn btn-danger">Yes</a>

                                  

                                </div>
                                
                              </div>
                            </div>
                          </div>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
@endsection