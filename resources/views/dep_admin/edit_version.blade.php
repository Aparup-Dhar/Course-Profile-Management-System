@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Version</h5>
            <form method="post" action="{{ url('/dep-admin/update-version/'.$version->id) }}">
            @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Version Name</label>
                <input value="{{ $version->name}}" type="text" class="form-control" id="" name="ver_name" aria-describedby="emailHelp">
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection