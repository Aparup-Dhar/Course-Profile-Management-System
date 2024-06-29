@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Course Objective</h5>
            <form method="post" action="{{ url('/dep-admin/update-cp-obj/'.$objective->id) }}">
            @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Objective ID</label>
                <input type="text" value="{{ $objective->objective_id }}" class="form-control" id="" name="cobj_num" aria-describedby="emailHelp" placeholder="Objective ID">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Objective Description</label>
                <textarea class="form-control" id="" name="cobj_des" aria-describedby="emailHelp" placeholder="Objective Description" rows="1">{{ $objective->objective_des }}</textarea>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection