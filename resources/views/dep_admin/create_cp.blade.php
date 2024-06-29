@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create Course Profile</h5>
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
                    <a href="{{url('/dep-admin/create-cp-select/'.$c->id)}}" class="btn btn-success"><i class="ti ti-plus"></i> Create</a>
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