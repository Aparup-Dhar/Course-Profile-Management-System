@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">View Departments</h5>
            <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Department Name</th>
                <th>Code</th>
                <th>Established</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $d)
            <tr>
                <td>{{ $d->dep_name }}</td>
                <td>{{ $d->dep_code }}</td>
                <td>{{ $d->dep_estb }}</td>
                <td>
                    <a href="{{url('/root/edit-department/'.$d->id)}}" class="btn btn-secondary"><i class="ti ti-edit"></i> Edit</a>
                    <a href="" data-toggle="modal" data-target="#myModal{{$d->id}}" class="btn btn-danger"><i class="ti ti-trash"></i> Delete</a>
                    
                            <!-- The Delete Modal -->
                            <div class="modal fade" id="myModal{{$d->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                              
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Delete  Confirmation</h4>
                                  <i type="button" data-dismiss="modal" class="ti ti-x"></i>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                  Are you sure you want to delete <b>{{$d->dep_name}}</b>?
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="{{url('/root/delete-department/'.$d->id)}}" class="btn btn-danger">Yes</a>

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