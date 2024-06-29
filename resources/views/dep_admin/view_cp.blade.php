@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">View Course Profile</h5>
            <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Version</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->course_code }}</td>
                <td>{{ $c->version }}</td>
                <td>
                <a href="{{ url('/dep-admin/generate-pdf/'.$c->id) }}"  target="_blank" class="btn btn-success"><i class="ti ti-eye"></i> Preview</a>
                <a href="{{ url('/dep-admin/download-pdf/'.$c->id) }}" class="btn btn-warning"><i class="ti ti-download"></i> Download</a>
                <a href="{{url('/dep-admin/edit-cp/'.$c->id)}}" class="btn btn-secondary"><i class="ti ti-edit"></i> Edit</a>
                    <a href="" data-toggle="modal" data-target="#myModal{{$c->id}}" class="btn btn-danger"><i class="ti ti-trash"></i> Delete</a>
                    
                            <!-- The Delete Modal -->
                            <div class="modal fade" id="myModal{{$c->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                              
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Delete  Confirmation</h4>
                                  <i type="button" data-dismiss="modal" class="ti ti-x"></i>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                  Are you sure you want to delete Course Profile for <b>{{$c->name}}</b>?
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="{{ url('/dep-admin/delete-cp/'.$c->id) }}" class="btn btn-danger">Yes</a>

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