@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create New Admin</h5>
            <form method="post" action="{{ url('/root/save-dep-admin') }}">
            @csrf
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Admin Name</label>
                <input type="text" class="form-control" id="" name="name" aria-describedby="emailHelp">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Admin Email</label>
                <input type="email" class="form-control" id="" name="email">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Admin Password</label>
                <input type="password" class="form-control" id="" name="password">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="" name="confirm_pass">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Admin Phone</label>
                <input type="number" class="form-control" id="" name="phone">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Admin Department</label>
                <select name="department" id=""  class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $d)
                <option value="{{$d->dep_code}}">{{$d->dep_name}}</option>
                @endforeach
                </select>  
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Admin Role</label>
                <select name="role" id=""  class="form-control">
                <option value="">Select Role</option>
                <option value="root">Root Admin</option>
                <option value="dep">Department</option>
                </select>                
              </div>
              <div class="mb-4">
                      <input type="checkbox" class="form-check-input" id="" value="true" name="status">
                      <label class="form-check-label" for="exampleCheck1">Active</label>
              </div>
              <br>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
@endsection