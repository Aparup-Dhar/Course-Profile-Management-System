@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Course Rational</h5>
            <form method="post" action="{{ url('/dep-admin/update-cp-rtn/'.$rational->id) }}">
            @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Rational Description</label>
                <textarea class="form-control" id="" name="c_rational" aria-describedby="emailHelp" placeholder="Rational Description" rows="4">{{ $rational->rational_des }}</textarea>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection