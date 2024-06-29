@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create New Course</h5>
            <form method="post" action="{{ url('/dep-admin/save-course') }}">
            @csrf
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="" name="cor_name" aria-describedby="emailHelp">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Course Short Name</label>
                <input type="text" class="form-control" id="" name="cor_srt_name">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Course Code</label>
                <input type="text" class="form-control" id="" name="cor_code">
              </div>
              <div class="mb-3 col-md-6">
                <label for="" class="form-label">Course Credit</label>
                <select name="cor_credit" id="" class="form-control">
                    <option value="">Select Credit</option>
                    <option value="1">1</option>
                    <option value="1.5">1.5</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="" class="form-label">Course Type</label>
                <select name="cor_type" id="" class="form-control">
                    <option value="">Select Course Type</option>
                    <option value="Theory">Theory</option>
                    <option value="Lab">Lab</option>
                    <option value="Project">Project/Thesis</option>
                </select>
              </div>
              <input type="text" class="form-control" id="" name="cor_dep" value="{{ Session::get('department')}}" hidden>
              <div class="mb-3 col-md-6">
                <label for="" class="form-label">Course Version</label>
                <select name="cor_version" id="" class="form-control">
                    <option value="">Select Version</option>
                    @foreach($versions as $v)
                    <option value="{{ $v->name }}">{{ $v->name }}</option>
                    @endforeach
                </select>
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