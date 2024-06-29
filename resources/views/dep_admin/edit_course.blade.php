@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Course</h5>
            <form method="post" action="{{ url('/dep-admin/update-course/'.$course->id) }}">
            @csrf
              <div class="row">
              <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Course Name</label>
                <input value="{{ $course->name }}" type="text" class="form-control" id="" name="cor_name" aria-describedby="emailHelp">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Course Short Name</label>
                <input value="{{ $course->short_name }}" type="text" class="form-control" id="" name="cor_srt_name">
              </div>
              <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Course Code</label>
                <input value="{{ $course->course_code }}" type="text" class="form-control" id="" name="cor_code">
              </div>
              <div class="mb-3 col-md-6">
                <label for="" class="form-label">Course Type</label>
                <select name="cor_credit" id="" class="form-control">
                    <option value="">Select Credit</option>
                    <option value="1" {{$course->credit=='1' ? 'selected':''}}>1</option>
                    <option value="1.5" {{$course->credit=='1.5' ? 'selected':''}}>1.5</option>
                    <option value="2" {{$course->credit=='2' ? 'selected':''}}>2</option>
                    <option value="3" {{$course->credit=='3' ? 'selected':''}}>3</option>
                    <option value="4" {{$course->credit=='4' ? 'selected':''}}>4</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="" class="form-label">Course Type</label>
                <select name="cor_type" id="" class="form-control">
                    <option value="">Select Course Type</option>
                    <option value="Theory" {{$course->type=='Theory' ? 'selected':''}}>Theory</option>
                    <option value="Lab"  {{$course->type=='Lab' ? 'selected':''}}>Lab</option>
                    <option value="Project"  {{$course->type=='Project' ? 'selected':''}}>Project/Thesis</option>
                </select>
              </div>
              <input type="text" class="form-control" id="" name="cor_dep" value="{{ $course->department }}" hidden>
              <div class="mb-3 col-md-6">
                <label for="" class="form-label">Course Version</label>
                <select name="cor_version" id="" class="form-control">
                <option value="">Select Version</option>
                @foreach($versions as $v)
                <option value="{{$v->name}}" {{$course->version==$v->name ? 'selected':''}}>{{$v->name}}</option>
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