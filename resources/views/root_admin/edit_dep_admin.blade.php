@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create New Admin</h5>
            <form method="post" action="{{ url('/root/update-dep-admin/'.$admin->id) }}">
            @csrf
            <div class="row">
               <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Admin ID</label>
                <input value="{{ $admin->id}}" type="text" class="form-control" id="" name="name" aria-describedby="emailHelp" readonly>
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Admin Name</label>
                <input value="{{ $admin->name}}" type="text" class="form-control" id="" name="name" aria-describedby="emailHelp">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Admin Email</label>
                <input value="{{ $admin->email}}" type="email" class="form-control" id="" name="email">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Admin Phone</label>
                <input value="{{ $admin->phone}}" type="number" class="form-control" id="" name="phone">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Admin Department</label>
                <select name="department" id=""  class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $d)
                <option value="{{$d->dep_code}}" {{$admin->department==$d->dep_code ? 'selected':''}}>{{$d->dep_name}}</option>
                @endforeach
                </select>  
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Admin Role</label>
                <select name="role" id=""  class="form-control">
                <option value="">Select Role</option>
                <option value="root" {{$admin->role=='root' ? 'selected':''}}>Root Admin</option>
                <option value="dep" {{$admin->role=='dep' ? 'selected':''}}>Department</option>
                </select>                
              </div>
              <div class="mb-4">
                      <input type="checkbox" class="form-check-input" id="" value="true" name="status" {{$admin->status=='1' ? 'checked':''}}>
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