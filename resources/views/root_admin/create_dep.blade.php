@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create New Department</h5>
            <form method="post" action="{{ url('/root/save-department') }}">
            @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Department Name</label>
                <input type="text" class="form-control" id="" name="dep_name" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Department Code</label>
                <input type="text" class="form-control" id="" name="dep_code">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Department Established</label>
                <input type="date" class="form-control" id="" name="dep_estb">
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection